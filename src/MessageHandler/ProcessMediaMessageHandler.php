<?php

namespace App\MessageHandler;

use App\Entity\MediaList;
use App\Message\ProcessMediaMessage;
use App\Repository\MediaListRepository;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ProcessMediaMessageHandler
{
    private MediaManager $mediaManager;
    private MediaListManager $mediaListManager;
    private MediaListRepository $mediaListRepository;
    private LoggerInterface $logger;

    public function __construct(MediaManager $mediaManager, MediaListManager $mediaListManager, MediaListRepository $mediaListRepository, LoggerInterface $logger)
    {
        $this->mediaManager = $mediaManager;
        $this->mediaListRepository = $mediaListRepository;
        $this->mediaListManager = $mediaListManager;
        $this->logger = $logger;
    }

    public function __invoke(ProcessMediaMessage $message)
    {
        // Récupérer la MediaList à partir de son ID
        $mediaList = $this->mediaListRepository->find($message->getMediaListId());
        if (!$mediaList) {
            throw new \RuntimeException('Media list not found');
        } else {

            try{

                $this->logger->info('Processing mediaList: ' . $message->getMediaListId());

                // Lancer la fonction de récupération et persistance des medias
                $mediaList = $this->mediaManager->getAllMediasInfos($mediaList, $message->getMedias());

                // Vérifie si le scan est terminé
                if($mediaList->getScanStatus() != "erreur"){
                    if ($mediaList->isScanComplete()) {
                        $mediaList->setScanStatus('terminé');
                        $mediaList->setUpdatedAt(new \DateTimeImmutable());
                        $mediaList->setLastUpdateResult(true);
                        $mediaList->setTotalMedias(count($mediaList->getMedia()));
                        $this->mediaListManager->persistMediaList($mediaList);
                    }
                } else{
                    throw new \RuntimeException('Erreur');
                }

            } catch (\Throwable $e) {
                // En cas d'erreur, récupérer la MediaList
                $mediaList = $this->mediaListRepository->find($message->getMediaListId());

                if ($mediaList) {
                    // Changer le statut en "erreur"
                    $mediaList->setScanStatus('erreur');
                    $mediaList->setLastUpdateResult(false);
                    $mediaList->setUpdatedAt(new \DateTimeImmutable());
                    $this->mediaListManager->persistMediaList($mediaList);
                }

                // Log de l'erreur
                $this->logger->critical("Erreur lors du traitement de la MediaList ID {$message->getMediaListId()} : {$e->getMessage()}", [
                    'exception' => $e,
                ]);

                // Renvoyer l'exception pour que le gestionnaire Messenger puisse la traiter
                throw $e;
            }

        }

    }
}