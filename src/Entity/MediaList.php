<?php

namespace App\Entity;

use App\Repository\MediaListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MediaListRepository::class)]
class MediaList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, unique: true)]
    private ?string $url = null;

    #[ORM\Column]
    private ?int $x_last_videos = null;

    #[ORM\Column]
    private ?int $delete_after = null;

    #[ORM\Column(length: 20)]
    private ?string $cronjob = null;

    #[ORM\Column]
    private ?int $quality = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $path = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private ?bool $archived = false;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(options: ['default' => 0])]
    #[Assert\Range(
        notInRangeMessage: 'La valeur totalVideos ne peut pas être inférieure à {{ min }}',
        min: 0
    )]
    private ?int $totalVideos = 0;

    #[ORM\Column(options: ['default' => 0])]
    #[Assert\Range(
        notInRangeMessage: 'La valeur de downloadedVideo ne peut pas être inférieure à {{ min }}',
        min: 0
    )]
    private ?int $downloadedVideos = 0;

    #[ORM\Column(options: ['default' => 0])]
    #[Assert\Range(
        notInRangeMessage: 'La valeur de deletedVideo ne peut pas être inférieure à {{ min }}',
        min: 0
    )]
    private ?int $deletedVideos = 0;

    #[ORM\Column(nullable: true)]
    private ?bool $lastUpdateResult = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\OneToMany(targetEntity: Media::class, mappedBy: 'mediaList', cascade: ['remove'], orphanRemoval: true)]
    private Collection $media;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scanStatus = "en cours";

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    #[Assert\Range(
        notInRangeMessage: 'La valeur de remainingMessages ne peut pas être inférieure à {{ min }}',
        min: 0
    )]
    private int $remainingMessages = 0;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getXLastVideos(): ?int
    {
        return $this->x_last_videos;
    }

    public function setXLastVideos(int $x_last_videos): static
    {
        $this->x_last_videos = $x_last_videos;

        return $this;
    }

    public function getDeleteAfter(): ?int
    {
        return $this->delete_after;
    }

    public function setDeleteAfter(int $delete_after): static
    {
        $this->delete_after = $delete_after;

        return $this;
    }

    public function getCronjob(): ?string
    {
        return $this->cronjob;
    }

    public function setCronjob(string $cronjob): static
    {
        $this->cronjob = $cronjob;

        return $this;
    }

    public function getQuality(): ?int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): static
    {
        $this->quality = $quality;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): static
    {
        $this->archived = $archived;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getTotalMedias(): ?int
    {
        return $this->totalVideos;
    }

    public function setTotalMedias(?int $totalVideos): static
    {
        $this->totalVideos = $totalVideos;

        return $this;
    }

    public function getDownloadedVideos(): ?int
    {
        return $this->downloadedVideos;
    }

    public function setDownloadedVideos(?int $downloadedVideos): static
    {
        $this->downloadedVideos = $downloadedVideos;

        return $this;
    }

    public function getDeletedVideos(): ?int
    {
        return $this->deletedVideos;
    }

    public function setDeletedVideos(?int $deletedVideos): static
    {
        $this->deletedVideos = $deletedVideos;

        return $this;
    }

    public function isLastUpdateResult(): ?bool
    {
        return $this->lastUpdateResult;
    }

    public function setLastUpdateResult(?bool $lastUpdateResult): static
    {
        $this->lastUpdateResult = $lastUpdateResult;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setMediaList($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getMediaList() === $this) {
                $medium->setMediaList(null);
            }
        }

        return $this;
    }

    public function getScanStatus(): ?string
    {
        return $this->scanStatus;
    }

    public function setScanStatus(string $scanStatus): static
    {
        $this->scanStatus = $scanStatus;

        return $this;
    }

    public function setRemainingMessages(int $messages): void
    {
        if($messages > 0) {
            $this->remainingMessages = $messages;
        } else {
            $this->remainingMessages = 0;
        }
    }

    public function decrementRemainingMessages(): void
    {
        $this->remainingMessages--;
    }

    public function getRemainingMessages(): int
    {
        return $this->remainingMessages;
    }

    public function isScanComplete(): bool
    {
        return $this->remainingMessages === 0;
    }
}
