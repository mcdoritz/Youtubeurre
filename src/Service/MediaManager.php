<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\MediaList;
use App\Repository\MediaRepository;
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
    private MediaRepository $mediaRepository;

    public function __construct(ProcessExecutor $processExecutor,
                                EntityManagerInterface $entityManager,
                                YTDLPManager $ytdlpManager,
                                MediaListManager $mediaListManager,
                                LoggerInterface $logger,
                                MediaRepository $mediaRepository,) {
        $this->processExecutor = $processExecutor;
        $this->entityManager = $entityManager;
        $this->ytdlpManager = $ytdlpManager;
        $this->mediaListManager = $mediaListManager;
        $this->logger = $logger;
        $this->mediaRepository = $mediaRepository;
    }

    /*
     * Permet de récupérer l'id, le titre, l'auteur des vidéos
     * %(id)s, %(title)s, %(uploader)s
     */
    public function getMediasInfos(MediaList $mediaList): array
    {
        $url = $mediaList->getUrl();
        $channel = str_contains($url, 'https://www.youtube.com/@');
        $mediaList->setType($channel ? 1 : 0);
        $title = $mediaList->getTitle();

        // Note : dans la commande, il faut toujours qu'on indique le titre afin de détecter les vidéos unavailable
        // On met le titre au début comme ça on sait toujours ce qu'on a à enlever
        $command = [
            'yt-dlp',
            $url,
            '--flat-playlist',
            '--lazy-playlist',
            '-O', '%(title)s//%(id)s//%(title)s//%(uploader)s'
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

        // Vérifier que le titre de la playlist/chaine n'est pas NA
        foreach ($mediasTrimed as $key => $mediaString) {
            if($mediaString[2] == "NA"){
                $mediaString[2] = $title;
            }
            $mediasTrimed[$key] = $mediaString;
        }

        // Créer un objet media et l'insérer dans le tableau
        $mediasWithInfos = [];
        foreach ($mediasTrimed as $media) {
            $newMedia = new Media();
            $newMedia->setYoutubeId($media[0]);
            $newMedia->setTitle($media[1]);
            $newMedia->setAuthor($media[2]);
            $newMedia->setMedialist($mediaList);
            $mediasWithInfos[] = $newMedia;
        }

        return $mediasWithInfos;
    }

    /*
     * $medias est un tableau[string]avec
     * $media[0] : id youtube
     * $media[1] : titre de la vidéo
     * $media[2] : auteur de la vidéo
     */
    public function getAllMediasInfos(MediaList $mediaList, array $medias): MediaList
    {
        try{
            foreach ($medias as $key => $media) {
                $id = $media->getYoutubeId();

                if (!empty($id)) {
                    // Vérifier d'abord que le média n'existe pas déjà dans la bdd
                    if(!$this->mediaRepository->findOneBy(['id' => $id])) {
                        $newMedia = new Media();
                        $date = new \DateTimeImmutable();
                        $media->setUploadDate($date); // Date par défaut : now
                        $commandDate = [
                            'yt-dlp',
                            "https://www.youtube.com/watch?v=$id",
                            '-O', '%(upload_date>%Y-%m-%d)s'
                        ];
                        $downloadable = false;
                        try {
                            $outputDate = $this->processExecutor->execute($commandDate);
                            $this->logger->info($this->ytdlpManager->trimResults($outputDate, "none")[0]);
                            if (str_contains($outputDate, 'Sign in to confirm your age')) {
                                $this->logger->warning("Restriction d'âge détectée pour la vidéo ID $id.");
                                $media->setTitle("[RESTRICTED] - " . ($media->getTitle() ?? 'Titre inconnu'));

                            } elseif (str_contains($outputDate, 'ERROR:')) {
                                $this->logger->error("Erreur yt-dlp pour la vidéo ID $id : " . $outputDate);
                                $media->setTitle("[ERRORED] - " . ($media->getTitle() ?? 'Titre inconnu'));

                            } else {
                                // On remplace la date par défaut par la vraie date d'upload
                                $date = \DateTimeImmutable::createFromFormat('Y-m-d', $this->ytdlpManager->trimResults($outputDate, "none")[0]);
                                $media->setUploadDate($date);
                                $downloadable = true;
                                $this->logger->info("Média à enregistrer ; id : " . $media->getYoutubeId() . ", titre : " . $media->getTitle() . ", auteur : " . $media->getAuthor() . ", date : " . $date->format('Y-m-d'));
                            }
                        } catch (\Exception $e) {
                            // Gère toute exception inattendue
                            $this->logger->error("Exception critique pour la vidéo ID $id : " . $e->getMessage());
                            $media->setTitle("[EXCEPTION] - " . ($media->getTitle() ?? 'Titre inconnu'));

                        }
                        if($media->getTitle() == "NA"){
                            $media->setTitle($mediaList->getTitle());// SI la mediaList est une chaîne, alors il faut donner le nom de l'uploader selon le titre;
                        }

                        if (!$date) {
                            $this->logger->warning("Date invalide pour la vidéo ID $id : " . $media->getUploadDate());
                            $date = new \DateTimeImmutable(); // Utilise une date par défaut (actuelle)
                        }


                        // Crée et persiste le média avec les données récupérées ou par défaut
                        $newMedia->setDownloadable($downloadable);
                        $newMedia->setYoutubeId($media->getYoutubeId() ?? null);
                        $newMedia->setTitle($media->getTitle());
                        $newMedia->setUploadDate($media->getUploadDate());
                        $newMedia->setScannedAt(new \DateTimeImmutable());
                        $newMedia->setAuthor($media->getAuthor() ?? null);
                        $newMedia->setMediaList($mediaList);

                        if ($this->persist1Media($newMedia)) {
                            $this->logger->info("Média persisté avec l'ID YouTube : " . $newMedia->getYoutubeId() . " : " . $newMedia->getUploadDate()->format('Y-m-d') ."/" .  $newMedia->getAuthor() . " , il reste " . $mediaList->getRemainingMessages() . " vidéos");
                        }
                        // Décrémente le compteur pour cette vidéo, même en cas d'erreur
                        $mediaList->decrementRemainingMessages();
                        $this->mediaListManager->persistMediaList($mediaList);
                    } else {
                        // On ne décrémente pas le compteur
                        $this->logger->info("Vérification de la présence du média en bdd : déjà existant avec l'ID YouTube : " . $media->getYoutubeId());
                    }

                }
            }
        } catch (\Throwable $e) {
            // En cas d'erreur critique, changer le statut de la MediaList
            $mediaList->setScanStatus('erreur');
            $mediaList->setLastUpdateResult(false);
            $this->mediaListManager->persistMediaList($mediaList);

            $this->logger->critical("Erreur critique lors du scan de la MediaList ID {$mediaList->getId()} : {$e->getMessage()}", [
                'exception' => $e,
            ]);

            throw $e; // Renvoyer l'exception pour que le système Messenger puisse la traiter
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
            $this->logger->info("Persistance : Média déjà existant avec l'ID YouTube : " . $media->getYoutubeId());
            return false; // Ignore les doublons
        }

        $this->entityManager->persist($media);
        $this->entityManager->flush();

        return true;

    }

    public function remove1Media(Media $media): bool
    {

        $existingMedia = $this->entityManager->getRepository(Media::class)
            ->findOneBy(['youtubeId' => $media->getYoutubeId()]);

        if ($existingMedia) {
            $this->entityManager->remove($media);
            $this->entityManager->flush();
            $this->logger->info("Persistance : Média supprimé avec l'ID YouTube : " . $media->getYoutubeId());
            return true;
        }
        $this->logger->info("Persistance : à supprimer NON TROUVE avec l'ID YouTube : " . $media->getYoutubeId());

        return false;

    }

    /*
     * Attention, ici les $medias ne sont que sous la forme d'un tableau de youtube id (string) :
     * 0 : youtube id
     */
    public function removeMedias(array $medias): bool
    {
        $no_error = true;
        foreach ($medias as $youtubeId) {
            $mediaToDelete = $this->entityManager->getRepository(Media::class)
                ->findOneBy(['youtubeId' => $youtubeId]);

            if ($mediaToDelete) {
                $this->entityManager->remove($mediaToDelete);
                $this->entityManager->flush();
                $this->logger->info("Persistance : Média supprimé avec l'ID YouTube : " . $mediaToDelete->getYoutubeId());

            }
            $this->logger->info("Persistance : à supprimer NON TROUVE avec l'ID YouTube : " . $mediaToDelete->getYoutubeId());
            $no_error = false;

        }

        return $no_error;

    }

    public function checkUnavailableMedias(string $media): bool {
        if(!str_contains($media, "//[Deleted video]") && !str_contains($media, "//[Private video]") && !str_contains($media, "//[Unavailable video]") && !str_contains($media, "//[Blocked video]")){
            return true;
        }else{
            return false;
        }
    }

}