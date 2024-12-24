<?php

namespace App\Controller;

use App\Service\ProcessExecutor;
use App\Service\YTDLPManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateYTDLPController extends AbstractController
{
    #[Route('/update/ytdlp', name: 'ytdlp.update')]
    public function index(Request $request, YTDLPManager $YTDLPManager): Response
    {
        if($YTDLPManager->updateYTDLP()){
            $this->addFlash('success', 'YTDLP mis à jour !');
        } else{
            $this->addFlash('neutral', 'YTDLP déjà à jour !');
        }

        $this->addFlash('success', '');

        return $this->redirectToRoute('about');
    }
}
