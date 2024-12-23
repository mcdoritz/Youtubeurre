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

    public function getMediasIdAndTitle(MediaList $mediaList): array
    {
        $url = $mediaList->getUrl();
        $mediaList->setType(str_contains($url, 'https://www.youtube.com/@') ? 1 : 0);

        $command = [
            'yt-dlp',
            $url,
            '--flat-playlist',
            '--lazy-playlist',
            '-O', '%(id)s//%(title)s'
        ];

        $output = $this->processExecutor->execute($command);
        $medias = $this->ytdlpManager->trimResults($output, "\n");
        $mediasTrimed = [];
        foreach ($medias as $media) {
            if ($this->checkUnavailableMedias($media)) {
                $mediasTrimed[] = $this->ytdlpManager->trimResults($media, "//");
            }
        }

        return $mediasTrimed;
    }

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

                try {
                    $outputDate = $this->processExecutor->execute($commandDate);

                    if (str_contains($outputDate, 'Sign in to confirm your age')) {
                        $this->logger->warning("Restriction d'âge détectée pour la vidéo ID $id.");
                        $media[2] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                        $media[1] = "[RESTRICTED] - " . ($media[1] ?? 'Titre inconnu');
                    } elseif (str_contains($outputDate, 'ERROR:')) {
                        $this->logger->error("Erreur yt-dlp pour la vidéo ID $id : " . $outputDate);
                        $media[2] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                        $media[1] = "[ERRORED] - " . ($media[1] ?? 'Titre inconnu');
                    } else {
                        $media[2] = $this->ytdlpManager->trimResults($outputDate, "none")[0];
                    }
                } catch (\Exception $e) {
                    // Gère toute exception inattendue
                    $this->logger->error("Exception critique pour la vidéo ID $id : " . $e->getMessage());
                    $media[2] = (new \DateTimeImmutable())->format('Y-m-d'); // Date actuelle
                    $media[1] = "[EXCEPTION] - " . ($media[1] ?? 'Titre inconnu');
                }

                // Crée et persiste le média avec les données récupérées ou par défaut
                $newMedia->setYoutubeId($media[0] ?? null);
                $newMedia->setTitle($media[1] ?? 'Erreur');
                $newMedia->setUploadDate(\DateTime::createFromFormat('Y-m-d', $media[2]) ?: new \DateTimeImmutable());
                $newMedia->setAuthor($mediaListAuthor);
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