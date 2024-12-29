<?php

namespace App\Controller;

use App\Repository\MediaListRepository;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MediaListController extends AbstractController
{
    #[Route('/mediaList/{id}', name: 'show.mediaList', requirements: ['id' => '\d+'])]
    public function show(Request $request, int $id, MediaListRepository $mlr, MediaListManager $mediaListManager): Response
    {
        $mediaList = $mlr->find($id);

        $medias = $mediaList->getMedia();
        //dd(count($medias), $mediaList->getTotalMedias());
        if($mediaList->getScanStatus() != "en cours"){
            if(count($medias) != $mediaList->getTotalMedias()){
                $mediaList->setTotalMedias(count($medias));
                $mediaListManager->persistMediaList($mediaList);
            }
        }

        //dd($mediaList, $medias);
        return $this->render('mediaList.html.twig', [
            'controller_name' => 'MediaListController',
            'mediaList' => $mediaList,
            'medias' => $medias,
            'poster' => $mediaList->getPath() . $mediaList->getTitle() .'.jpg'
        ]);
    }
}
