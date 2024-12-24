<?php

namespace App\MessageHandler;

use App\Entity\MediaList;
use App\Message\ProcessMediaMessage;
use App\Repository\MediaListRepository;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ProcessMediaMessageHandler
{
    private MediaManager $mediaManager;
    private MediaListManager $mediaListManager;
    private MediaListRepository $mediaListRepository;

    public function __construct(MediaManager $mediaManager, MediaListManager $mediaListManager, MediaListRepository $mediaListRepository)
    {
        $this->mediaManager = $mediaManager;
        $this->mediaListRepository = $mediaListRepository;
        $this->mediaListManager = $mediaListManager;
    }

    public function __invoke(ProcessMediaMessage $message)
    {

        // Récupérer la MediaList à partir de son ID
        $mediaList = $this->mediaListRepository->find($message->getMediaListId());

        if (!$mediaList) {
            throw new \RuntimeException('Media list not found');
        }

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
    }
}