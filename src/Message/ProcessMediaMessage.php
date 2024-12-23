<?php

namespace App\Message;

class ProcessMediaMessage
{
    private array $medias; // Tableau des médias
    private int $mediaListId;

    public function __construct(array $medias, int $mediaListId)
    {
        $this->medias = $medias; // Chaque média est un tableau avec id et titre
        $this->mediaListId = $mediaListId;
    }

    public function getMedias(): array
    {
        return $this->medias;
    }

    public function getMediaListId(): int
    {
        return $this->mediaListId;
    }
}