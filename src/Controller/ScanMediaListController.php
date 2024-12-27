<?php

namespace App\Controller;

use App\Message\ProcessMediaMessage;
use App\Repository\MediaListRepository;
use App\Repository\MediaRepository;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use App\Service\YTDLPManager;
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
                          YTDLPManager $ytdlpManager,
                          MessageBusInterface $messageBus): Response
    {
        //Vérifier si un scan est déjà en cours...
        $mediaList = $mlr->findOneBy(['id' => $request->get('id')]);
        if($mediaList->getScanStatus() != "en cours"){
            // Vérifier les màj de ytdlp
            $ytdlpManager->updateYTDLP();
            $mediasAlreadyInDB = $mr->findBy(['mediaList' => $mediaList]);

            $mediasAlreadyinDBInfos = [];
            foreach($mediasAlreadyInDB as $media){
                $mediasAlreadyinDBInfos[] = [$media->getYoutubeId(), $media->getTitle(), $media->getAuthor()];
            }

            // Récupérer les infos de la médialist
            $mediasOnYoutube = $mediaManager->getMediasInfos($mediaList, ['%(id)s', '%(title)s', '%(uploader)s']);

            // Extraction des youtube id dans les 2 tableaux pour comparaison
            $keysOnYoutube = array_map(function ($media) {
                return $media[0]; // Le premier élément du sous-tableau
            }, $mediasOnYoutube);

            $keysAlreadyInDB = array_map(function ($media) {
                return $media[0];
            }, $mediasAlreadyinDBInfos);

            // Calcul des différences sur base des youtube id
            $youtubeIdToScan = array_diff($keysOnYoutube, $keysAlreadyInDB);

            $countYoutubeMedias = count($mediasOnYoutube);
            $countMediasAlreadyInDB = count($mediasAlreadyInDB);
            $countMediasToScan = $countYoutubeMedias - $countMediasAlreadyInDB;

            if ($countMediasToScan != 0){

                // Faire ressortir d'abord les vidéos différentes
                // Filtrer les sous-tableaux du second tableau
                $mediasToScan = array_filter($mediasOnYoutube, function ($subArray) use ($youtubeIdToScan) {
                    return in_array($subArray[0], $youtubeIdToScan);
                });

                // Ré-indexer le tableau (facultatif)
                $mediasToScan = array_values($mediasToScan);

                // S'il y a + de vidéos sur youtube que dans la bdd, alors on ajoute les vidéos
                if(count($mediasAlreadyInDB) < count($mediasOnYoutube)){
                    // Envoyer les médias pour traitement en arrière-plan
                    $mediaList->setScanStatus('en cours');
                    $mediaList->setTotalMedias($countYoutubeMedias);
                    $mediaList->setRemainingMessages($countMediasToScan);
                    $mediaListManager->persistMediaList($mediaList);
                    $messageBus->dispatch(new ProcessMediaMessage($mediasToScan, $mediaList->getId()));
                    $this->addFlash('success', 'Une ou des vidéos ont été ajoutées... scan en cours');
                } else { //Sinon on les suppr
                    // Extraction des clés [0] pour comparaison
                    $YoutubeIdmediasOnYoutube = array_map(function ($subArray) {
                        return $subArray[0];
                    }, $mediasOnYoutube);

                    $mediasToScan = array_filter(array_map(function ($subArray) {
                        return $subArray[0];
                    }, $mediasAlreadyinDBInfos), function ($key) use ($YoutubeIdmediasOnYoutube) {
                        return !in_array($key, $YoutubeIdmediasOnYoutube);
                    });
                    //dd($mediasAlreadyinDBInfos, $YoutubeIdmediasOnYoutube, $mediasToScan);

                    $mediaManager->removeMedias($mediasToScan);
                    //dd($mediaList, $countMediasToScan, $mediasAlreadyInDB, $mediasAlreadyinDBInfos, $mediasOnYoutube, $mediasToScan);
                    $this->addFlash('success', 'Une ou des vidéos ont été supprimées... scan en cours');
                }

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
