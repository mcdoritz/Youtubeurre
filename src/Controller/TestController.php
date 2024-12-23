<?php

namespace App\Controller;

use App\Entity\Media;
use App\Message\ProcessMediaMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController
{
    #[Route('/test-messenger', name: 'app_test')]
    public function testMessenger(MessageBusInterface $messageBus): Response
    {
        $media = new Media();
        $array[] = $media;
        // Crée un message avec des données fictives
        $message = new ProcessMediaMessage($array, 23);
        $messageBus->dispatch($message);

        return new Response('Message dispatched successfully!');
    }
}

