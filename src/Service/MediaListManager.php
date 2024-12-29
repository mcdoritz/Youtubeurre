<?php

namespace App\Service;

use App\Entity\MediaList;
use App\Message\ProcessMediaMessage;
use App\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Messenger\MessageBusInterface;

class MediaListManager {
    private ProcessExecutor $processExecutor;
    private FileManager $fileManager;
    private YTDLPManager $ytdlpManager;

    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;
    private YTDLPManager $YTDLPManager;
    private MediaRepository $mediaRepository;
    private MediaManager $mediaManager;
    private MessageBusInterface $messageBus;
    private CommandManagerService $commandManager;


    public function __construct(ProcessExecutor $processExecutor,
                                FileManager $fileManager,
                                EntityManagerInterface $entityManager,
                                YTDLPManager $ytdlpManager,
                                LoggerInterface $logger,
                                YTDLPManager $YTDLPManager,
                                MediaRepository $mediaRepository,
                                MediaManager $mediaManager,
                                MessageBusInterface $messageBus,
                                CommandManagerService $commandManager) {
        $this->processExecutor = $processExecutor;
        $this->fileManager = $fileManager;
        $this->entityManager = $entityManager;
        $this->ytdlpManager = $ytdlpManager;
        $this->logger = $logger;
        $this->YTDLPManager = $YTDLPManager;
        $this->mediaRepository = $mediaRepository;
        $this->mediaManager = $mediaManager;
        $this->messageBus = $messageBus;
        $this->commandManager = $commandManager;
    }

    public function scan(MediaList $mediaList): string
    {
        // Vérifier si un scan est déjà en cours
        if ($mediaList->getScanStatus() === "en cours") {
            $this->logger->info("Scan dejà en cours");
            return "Scan déjà en cours pour cette liste.";
        }
        $this->logger->info("Début du scan...");
        // Mettre à jour yt-dlp
        $this->YTDLPManager->updateYTDLP();

        // Récupérer les médias déjà en base
        $mediasAlreadyInDB = $this->mediaRepository->findBy(['mediaList' => $mediaList]);

        // Récupérer les médias sur YouTube
        $mediasOnYoutube = $this->mediaManager->getMediasInfos($mediaList);

        $countYoutubeMedias = count($mediasOnYoutube);
        $countMediasAlreadyInDB = count($mediasAlreadyInDB);
        $diff = $countYoutubeMedias - $countMediasAlreadyInDB;

        if($diff != 0){
            $youtubeIdsInDB = array_map(fn($media) => $media->getYoutubeId(), $mediasAlreadyInDB);
            $youtubeIdsOnYoutube = array_map(fn($media) => $media->getYoutubeId(), $mediasOnYoutube);

            if ($diff > 0) { // Il y a plus de vidéos sur youtube que dans la bdd
                $youtubeIdsToScan = array_diff($youtubeIdsOnYoutube, $youtubeIdsInDB);
                $mediasToScan = array_filter($mediasOnYoutube, fn($media) => in_array($media->getYoutubeId(), $youtubeIdsToScan));
                $mediasToScan = array_values($mediasToScan); // Ré-indexer
                if ($countMediasAlreadyInDB < $countYoutubeMedias) {
                    // Ajouter les médias
                    $mediaList->setScanStatus('en cours');
                    $mediaList->setTotalMedias($countYoutubeMedias);
                    $mediaList->setRemainingMessages($diff);
                    $this->persistMediaList($mediaList);

                    $this->messageBus->dispatch(new ProcessMediaMessage($mediasToScan, $mediaList->getId()));

                    return "$diff nouvelle(s) vidéo(s) ajoutée(s). Scan en cours...";
                } else {
                    // Supprimer les médias en trop
                    $youtubeIdsToDelete = array_diff($youtubeIdsInDB, $youtubeIdsOnYoutube);
                    $mediasToDelete = array_filter($mediasAlreadyInDB, fn($media) => in_array($media->getYoutubeId(), $youtubeIdsToDelete));
                    $mediasToDelete = array_values($mediasToDelete);
                    dd($mediasToDelete);
                    $mediaManager->removeMedias($idsToDelete);

                    return count($idsToDelete) . " vidéo(s) supprimée(s).";
                }
            }
        }

        return "Aucune nouvelle vidéo.";
    }

    public function getMediaListInfos(MediaList $mediaList): void {
        $url = $mediaList->getUrl();
        $mediaList->setType(str_contains($url, 'https://www.youtube.com/@') ? 1 : 0);
        $title = $this->commandManager->commandToGetMediaListTitle($mediaList);
        $mediaList->setTitle($title);

    }

    public function downloadMediaListFiles(MediaList $mediaList): void {
        $path = $this->fileManager->getAbsolutePath('data' . DIRECTORY_SEPARATOR . $mediaList->getPath());
        $title = $mediaList->getTitle();
        $url = $mediaList->getUrl();

        $command = <<<BASH
            yt-dlp --skip-download --flat-playlist --write-info-json --write-description --write-thumbnail --add-metadata -o "$path/$title/$title.%(ext)s" "$url"
            BASH;

        $this->processExecutor->execute(['bash', '-c', $command]);

    }

    /*
     * Vérifier comment se termine le path entré. S'il y a déjà un slash alors on en rajoute pas et vice versa. Ajouter 'data'
     */
    public function configurePath(MediaList $mediaList): bool
    {
        $path = $mediaList->getPath();

        if($path[strlen($path) - 1] == DIRECTORY_SEPARATOR) {
            $path = substr($path, 0, strlen($path) - 1);
        }

        if($path[0] != DIRECTORY_SEPARATOR) {
            $path = DIRECTORY_SEPARATOR . $path;
        }
        $this->fileManager->createDirectory($path);
        $this->fileManager->isWritable($path);

        return true;
    }

    public function copyPoster(MediaList $mediaList): bool
    {

        $sourceFile = $this->getPosterFileSource($mediaList);

        $destinationFile = $this->getCopiedPosterFileDestination($mediaList);
        $filesystem = new Filesystem();
        $filesystem->copy($sourceFile, $destinationFile, true);
        return true;
    }

    public function deleteMediaListFiles(MediaList $mediaList): bool
    {
        $folderToDelete = $this->getMediaListFolder($mediaList);
        $posterToDelete = $this->getCopiedPosterFileDestination($mediaList);

        $folderDeleted = $this->fileManager->deleteFolder($folderToDelete);
        $fileDeteted = $this->fileManager->deleteFile($posterToDelete);

        $this->entityManager->remove($mediaList);
        $this->entityManager->flush();

        if($folderDeleted && $fileDeteted) {
            return true;
        } else {
            return false;
        }
    }

    public function getCopiedPosterFileDestination(MediaList $mediaList) : string
    {
        $destinationDir = $this->fileManager->getAbsolutePath('public' . DIRECTORY_SEPARATOR . 'downloaded'. DIRECTORY_SEPARATOR .'posters'. DIRECTORY_SEPARATOR);

        return $destinationDir . $mediaList->getTitle() . '.jpg';
    }

    public function getMediaListFolder(MediaList $mediaList) : string
    {
        return $this->fileManager->getAbsolutePath('data' . DIRECTORY_SEPARATOR . $mediaList->getPath() . DIRECTORY_SEPARATOR . $mediaList->getTitle());
    }

    public function getPosterFileSource(MediaList $mediaList) : string
    {
        return $this->getMediaListFolder($mediaList) . DIRECTORY_SEPARATOR . $mediaList->getTitle() . '.jpg';
    }

    public function archiveMediaList(MediaList $mediaList): bool
    {
        if($mediaList->isArchived()) {
            $mediaList->setArchived(false);
        } else{
            $mediaList->setArchived(true);
        }
        $this->persistMediaList($mediaList);

        return true;
    }

    public function persistMediaList($mediaList): bool{
        $this->entityManager->persist($mediaList);
        $this->entityManager->flush();
        return true;
    }

    public function deleteMediaList($mediaList): bool{
        $this->entityManager->remove($mediaList);
        $this->entityManager->flush();
        return true;
    }
}