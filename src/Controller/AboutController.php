<?php

namespace App\Controller;

use App\Repository\MediaListRepository;
use App\Repository\MediaRepository;
use App\Repository\YtdlpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function about(YtdlpRepository $ytdlpr, MediaListRepository $mlr, MediaRepository $mr): Response
    {
        $ytdlp = $ytdlpr->findLastOrder(); // Récupère l'objet Ytdlp
        $mediaListsCount = $mlr->count([]);
        $mediasCount = $mr->count([]);

        return $this->render('about.html.twig', [
            'controller_name' => 'AboutController',
            'ytdlp' => $ytdlp, // Objet transmis à Twig
            'mediaListsCount' => $mediaListsCount,
            'mediasCount' => $mediasCount,
        ]);
    }
}
