<?php

namespace App\Controller;

use App\Entity\MediaList;
use App\Form\AddMediaListType;
use App\Message\ProcessMediaMessage;
use App\Service\MediaListManager;
use App\Service\MediaManager;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddMediaListController extends AbstractController
{
    #[Route('/add/mediaList', name: 'add.mediaList')]
    public function add(
        Request $request,
        MediaListManager $mediaListManager,
        MediaManager $mediaManager,
        MessageBusInterface $messageBus
    ): Response
    {
        $mediaList = new MediaList();
        $form = $this->createForm(AddMediaListType::class, $mediaList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Configurer les dossiers
            $mediaListManager->configurePath($mediaList);

            // Récupérer les infos de la médialist
            $mediaListManager->getMediaListInfos($mediaList);

            // Gérer le poster
            $mediaListManager->downloadMediaListFiles($mediaList);
            $mediaListManager->copyPoster($mediaList);

            // Récupérer les infos qu'on peut au début : titre des médias et id
            $mediasIdAndTitleAndVideoUploader = $mediaManager->getMediasInfos($mediaList, ['%(id)s', '%(title)s', '%(uploader)s']);
            // Ajouter le nb de vidéos trouvées dans la médialiste
            $totalMedias = count($mediasIdAndTitleAndVideoUploader);
            $mediaList->setTotalMedias($totalMedias);
            $mediaList->setRemainingMessages($totalMedias);

            // persister la médialist pour avoir son id dans la bdd
            $mediaListManager->persistMediaList($mediaList);
            $mediaListId = $mediaList->getId();

            // Envoyer les médias pour traitement en arrière-plan
            $messageBus->dispatch(new ProcessMediaMessage($mediasIdAndTitleAndVideoUploader, $mediaListId));

            // Ajouter un message flash
            $this->addFlash('success', 'La '.$mediaList->getType() == 0 ? 'playlist' : 'chaîne' .' a bien été ajoutée !');
            return $this->redirectToRoute('show.mediaList', ['id' => $mediaList->getId()]);
        }
        return $this->render('add_mediaList.html.twig', [
            'controller_name' => 'MediaListController',
            'form' => $form->createView(),
        ]);
    }
}
