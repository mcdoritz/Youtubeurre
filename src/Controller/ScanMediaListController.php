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
    public function index(Request $request, MediaListRepository $mlr, MediaListManager $mediaListManager): Response
    {
        $mediaList = $mlr->findOneBy(['id' => $request->get('id')]);

        if (!$mediaList) {
            $this->addFlash('error', 'Liste de médias introuvable.');
            return $this->redirectToRoute('home');
        }

        $result = $mediaListManager->scan($mediaList);

        $this->addFlash('success', $result);

        return $this->redirectToRoute('show.mediaList', ['id' => $mediaList->getId()]);
    }
}
