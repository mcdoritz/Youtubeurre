<?php

namespace App\Controller;

use App\Message\ProcessMediaMessage;
use App\Repository\MediaListRepository;
use App\Repository\MediaRepository;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class ScanMediaListController extends AbstractController
{
    #[Route('/scan/mediaList/{id}', name: 'scan.mediaList', requirements: ['id' => '\d+'])]
    public function index(Request $request,
                          MediaListRepository $mlr,
                          MediaRepository $mr,
                          MediaManager $mediaManager,
                          MediaListManager $mediaListManager,
                          MessageBusInterface $messageBus): Response
    {
        //Vérifier si un scan est déjà en cours...
        $mediaList = $mlr->findOneBy(['id' => $request->get('id')]);
        if($mediaList->getScanStatus() != "en cours"){
            $mediasAlreadyInDB = $mr->findBy(['mediaList' => $mediaList]);

            $mediasAlreadyinDBInfos = [];
            foreach($mediasAlreadyInDB as $media){
                $mediasAlreadyInDBInfos[] = [$media->getYoutubeId(), $media->getTitle(), $media->getAuthor()];
            }

            // Récupérer les infos de la médialist
            $mediasOnYoutube = $mediaManager->getMediasInfos($mediaList, ['%(id)s', '%(title)s', '%(uploader)s']);
            $mediasToScan = [];

            // Supprimer les éléments de $array2 qui sont présents dans $array1
            $mediasToScan = array_udiff($mediasOnYoutube, $mediasAlreadyInDBInfos, function ($a, $b) {
                // Comparaison stricte des sous-tableaux
                return $a === $b ? 0 : -1; // Retourne 0 si égaux, -1 si différents
            });

            $countMediasToScan = count($mediasToScan);

            if ($countMediasToScan != 0){
                // Envoyer les médias pour traitement en arrière-plan
                $mediaList->setScanStatus('en cours');
                $mediaList->setTotalMedias($mediaList->getTotalMedias() + $countMediasToScan);
                $mediaList->setRemainingMessages($countMediasToScan);
                $mediaListManager->persistMediaList($mediaList);
                $messageBus->dispatch(new ProcessMediaMessage($mediasToScan, $mediaList->getId()));
            } else{
                $this->addFlash('success', 'Aucune nouvelle vidéo');
            }

        } else {
            $this->addFlash('error', 'Scan déjà en cours');
        }

        return $this->redirectToRoute('show.mediaList', ['id' => $mediaList->getId()]);
    }
}


/*
 * // Récupérer les id des vidéos déjà scannées
            $mediasIdAlreadyScanned = [];
            foreach ($medias as $media) {
                $mediasIdAlreadyScanned[] = $media->getYoutubeId();
            }

            // Récupérer les id des vidéos sur youtube
            $mediasIdOnYoutube = $mediaManager->getMediasInfos($mediaList, ['%(id)s']);
            //Mettre en forme le tableau pour correspondre avec $mediasIdAlreadyScanned
            $mediasIdOnYoutubeCleaned = [];
            foreach ($mediasIdOnYoutube as $id) {
                $mediasIdOnYoutubeCleaned[] = $id[0];
            }

            // Comparer les id
            $missingIds = array_diff($mediasIdAlreadyScanned, $mediasIdOnYoutubeCleaned);
            dd($mediasIdAlreadyScanned, $mediasIdOnYoutubeCleaned);
 */
