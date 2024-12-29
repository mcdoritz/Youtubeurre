<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\MediaList;
use App\Message\ProcessMediaMessage;
use App\Repository\MediaListRepository;
use App\Repository\MediaRepository;
use App\Service\CommandManagerService;
use App\Service\MediaManager;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController
{
    #[Route('/test', name: 'app_test')]
    public function testMessenger(CommandManagerService $commandManagerService): Response
    {
        $mediaList = new MediaList();
        $mediaList->setUrl("https://www.youtube.com/playlist?list=PLoCjUSEhA7BEvGYmJQ1xp6-NDccqdJ3rQ");
        $mediaList->setType(0);
        $mediaList = $commandManagerService->commandToGetMediaListTitle($mediaList);
        dd($mediaList);

        return new Response('MediaManager test successful');
    }
}

