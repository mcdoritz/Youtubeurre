<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\MediaList;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class MediaManager
{
    private EntityManagerInterface $entityManager;
    private ProcessExecutor $processExecutor;
    private YTDLPManager $ytdlpManager;
    private MediaListManager $mediaListManager;
    private LoggerInterface $logger;

    public function __construct(ProcessExecutor $processExecutor, EntityManagerInterface $entityManager, YTDLPManager $ytdlpManager, MediaListManager $mediaListManager, LoggerInterface $logger) {
        $this->processExecutor = $processExecutor;
        $this->entityManager = $entityManager;
        $this->ytdlpManager = $ytdlpManager;
        $this->mediaListManager = $mediaListManager;
        $this->logger = $logger;
    }

    /*
     * Permet de récupérer l'id, le titre, l'auteur des vidéos
     * %(id)s , %(title)s, %(uploader)s
     */
    public function getMediasInfos(MediaList $mediaList, array $whatToGet): array
    {
        $url = $mediaList->getUrl();
        $mediaList->setType(str_contains($url, 'https://www.youtube.com/@') ? 1 : 0);

        $items = "";
        foreach ($whatToGet as $item) {
            $items .= $item . '//';
        }

        $items = substr($items, 0, strlen($items) -2);

        // Note : dans la commande, il faut toujours qu'on indique le titre afin de détecter les vidéos unavailable
        // On met le titre au début comme ça on sait toujours ce qu'on a à enlever
        $command = [
            'yt-dlp',
            $url,
            '--flat-playlist',
            '--lazy-playlist',
            '-O', '%(title)s//' . $items
        ];

        $output = $this->processExecutor->execute($command);

        $medias = $this->ytdlpManager->trimResults($output, "\n");
        $mediasTrimed = [];
        foreach ($medias as $mediaString) {
            $titleToCheck = "//".substr($mediaString, 0, strpos($mediaString, "//"));
            $media = substr($mediaString, strpos($mediaString, "//") + 2);

            if ($this->checkUnavailableMedias($titleToCheck)) {
                $mediasTrimed[] = $this->ytdlpManager->trimResults($media, "//");
            }

        }

        return $mediasTrimed;
    }

    /*
     * $medias est un tableau[string]avec
     * $media[0] : id youtube
     * $media[1] : titre de la vidéo
     * $media[2] : auteur de la vidéo
     */
    public function getAllMediasInfos(MediaList $mediaList, array $medias): MediaList
    {
        $mediaListAuthor = $mediaList->getTitle();
        foreach ($medias as $key => $media) {
            $id = $media[0];

            if (!empty($id)) {
                $newMedia = new Media();
                $commandDate = [
                    'yt-dlp',
                    "https://www.youtube.com/watch?v=$id",
                    '-O', '%(upload_date>%Y-%m-%d)s'
                ];
                $downloadable = false;
                try {
                    $outputDate = $this->processExecutor->execute($commandDate);

                    if (str_contains($outputDate, 'Sign in to confirm your age')) {
                        $this->logger->warning("Restriction d'âge détectée pour la vidéo ID $id.");
                        $media[3] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                        $media[1] = "[RESTRICTED] - " . ($media[1] ?? 'Titre inconnu');

                    } elseif (str_contains($outputDate, 'ERROR:')) {
                        $this->logger->error("Erreur yt-dlp pour la vidéo ID $id : " . $outputDate);
                        $media[3] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                        $media[1] = "[ERRORED] - " . ($media[1] ?? 'Titre inconnu');

                    } else {
                        $media[3] = $this->ytdlpManager->trimResults($outputDate, "none")[0];
                        $downloadable = true;
                    }
                } catch (\Exception $e) {
                    // Gère toute exception inattendue
                    $this->logger->error("Exception critique pour la vidéo ID $id : " . $e->getMessage());
                    $media[3] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                    $media[1] = "[EXCEPTION] - " . ($media[1] ?? 'Titre inconnu');

                }

                // Crée et persiste le média avec les données récupérées ou par défaut
                $newMedia->setDownloadable($downloadable);
                $newMedia->setYoutubeId($media[0] ?? null);
                $newMedia->setTitle($media[1] ?? 'Erreur');
                $newMedia->setUploadDate(\DateTime::createFromFormat('Y-m-d', $media[3]) ?: new \DateTimeImmutable());
                $newMedia->setScannedAt(new \DateTimeImmutable());
                $newMedia->setAuthor($media[2]);
                $newMedia->setMediaList($mediaList);

                if (!$this->persist1Media($newMedia)) {
                    $mediaList->setScanStatus("Erreur");
                }

                // Décrémente le compteur pour cette vidéo, même en cas d'erreur
                $mediaList->decrementRemainingMessages();
                $this->mediaListManager->persistMediaList($mediaList);
            }
        }

        return $mediaList;
    }

    public function persistMedias(array $medias): void {

        foreach ($medias as $media) {
            $this->entityManager->persist($media);
            $this->entityManager->flush();
        }

    }

    public function persist1Media(Media $media): bool
    {

        $existingMedia = $this->entityManager->getRepository(Media::class)
            ->findOneBy(['youtubeId' => $media->getYoutubeId()]);

        if ($existingMedia) {
            $this->logger->info("Média déjà existant avec l'ID YouTube : " . $media->getYoutubeId());
            return false; // Ignore les doublons
        }

        $this->entityManager->persist($media);
        $this->entityManager->flush();

        return true;

    }

    public function checkUnavailableMedias(string $media): bool {
        if(!str_contains($media, "//[Deleted video]") && !str_contains($media, "//[Private video]") && !str_contains($media, "//[Unavailable video]") && !str_contains($media, "//[Blocked video]")){
            return true;
        }else{
            return false;
        }
    }

}