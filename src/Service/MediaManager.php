<?php

namespace App\Service;

use App\Entity\Media;
use App\Entity\MediaList;
use Doctrine\ORM\EntityManagerInterface;

class MediaManager
{
    private EntityManagerInterface $entityManager;
    private ProcessExecutor $processExecutor;
    private YTDLPManager $ytdlpManager;

    public function __construct(ProcessExecutor $processExecutor, FileManager $fileManager, EntityManagerInterface $entityManager, YTDLPManager $ytdlpManager) {
        $this->processExecutor = $processExecutor;
        $this->entityManager = $entityManager;
        $this->ytdlpManager = $ytdlpManager;
    }

    public function getMediaListVideoInfos(MediaList $mediaList): array {
        $url = $mediaList->getUrl();
        $mediaList->setType(str_contains($url, 'https://www.youtube.com/@') ? 1 : 0);

        $command = [
            'yt-dlp',
            $url,
            '--flat-playlist',
            '--lazy-playlist',
            '-O', '%(title)s'
        ];

        $output = $this->processExecutor->execute($command);
        $arrayTitles = $this->ytdlpManager->trimResults($output, "\n");
        $mediaListAuthor = $mediaList->getTitle();

        $array = [];

        foreach ($arrayTitles as $title) {
            if(!str_contains($title, "[Deleted video]") && !str_contains($title, "[Private video]")){
                $media = new Media();
                $media->setTitle($title);
                $media->setAuthor($mediaListAuthor);
                $media->setMediaList($mediaList);
                $array[] = $media;
            }

        }
        return $array;
    }

    public function persistMedias(array $medias): void {

        foreach ($medias as $media) {
            $this->entityManager->persist($media);
            $this->entityManager->flush();
        }

    }

}