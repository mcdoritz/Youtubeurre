<?php

namespace App\Service;

/*
 * Ce service doit gérer le contenu des commandes de yt-dlp
 */

use App\Entity\MediaList;
use Psr\Log\LoggerInterface;

class CommandManagerService
{

    private ProcessExecutor $processExecutor;
    private YTDLPManager $ytdlpManager;
    public function __construct(ProcessExecutor $processExecutor, YTDLPManager $ytdlpManager){
        $this->processExecutor = $processExecutor;
        $this->ytdlpManager = $ytdlpManager;
    }

    /*
     *
     */
    public function commandToGetMediaListInfos(MediaList $mediaList): string
    {

        $url = $mediaList->getUrl();

        if($mediaList->getType() === 0){ // playlist
            $command = [
                'yt-dlp',
                $url,
                '--flat',
                '--lazy-playlist',
                '--playlist-items', '1',
                '-O', '%(playlist_title)s//%(playlist_count)s/%(tags)s',
            ];


        } else { // chaine
            $command = [
                'yt-dlp',
                $url,
                '--playlist-items', '1',
                '-O', '%(uploader)s',
            ];
        }

        $output = $this->processExecutor->execute($command);
        dd($output);
        $title = $this->ytdlpManager->trimResults($output, "\n")[0];

        return $title;
    }
}