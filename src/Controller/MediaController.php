<?php

namespace App\Controller;

use App\Repository\MediaListRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MediaController extends AbstractController
{
    #[Route('/media/{id}', name: 'show.media', requirements: ['id' => '\d+'])]
    public function show(Request $request, int $id, MediaRepository $mr): Response
    {
        $media = $mr->find($id);

        return $this->render('media.html.twig', [
            'controller_name' => 'MediaController',
            'media' => $media
        ]);
    }
}
