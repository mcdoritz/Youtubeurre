<?php

namespace App\Service;

use App\Entity\Ytdlp;
use App\Repository\YtdlpRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class YTDLPManager
{
    private ProcessExecutor $processExecutor;
    private EntityManagerInterface $entityManager;
    private YtdlpRepository $ytdlpr;
    private LoggerInterface $logger;

    public function __construct(ProcessExecutor $processExecutor, EntityManagerInterface $entityManager, YtdlpRepository $ytdlpr, LoggerInterface $logger)
    {
        $this->processExecutor = $processExecutor;
        $this->entityManager = $entityManager;
        $this->ytdlpr = $ytdlpr;
        $this->logger = $logger;
    }

    public function trimResults(string $output, string $separator): array
    {
        if($separator != "none"){
            return explode($separator, trim($output));
        } else {
            return [trim($output)];
        }

    }

    public function updateYTDLP() : bool
    {
        $this->logger->info("Updating YTDLP...");
        $output = $this->processExecutor->execute(['yt-dlp', '-U']);
        $output = $this->trimResults($output, "\n");
        $pos = strpos($output[0], "@");
        $currentVersion = substr($output[0], $pos + 1, 10);
        $pos = strpos($output[1], "@");
        $latestVersion = substr($output[1], $pos + 1, 10);
        if($currentVersion != $latestVersion){
            $this->logger->info("YTDLP NON à jour... passage de la version $currentVersion à la version $latestVersion");
            $this->persistYTDLP($latestVersion);
            return true;
        } else {
            // Récupérer le dernier objet ytdpb
            $ytdlp = $this->ytdlpr->findLastOrder();
            if($ytdlp == null || $ytdlp->getVersion() != $latestVersion){
                $this->logger->info("YTDLP déjà à jour... mais non noté dans la bdd. Persistance...");
                $this->persistYTDLP($currentVersion);
                return true;
            } else{
                $this->logger->info("YTDLP déjà à jour...");
                return false;
            }
        }
    }

    public function persistYTDLP(string $version) : void
    {
        $ytdlp = new Ytdlp();
        $ytdlp->setVersion($version);
        $ytdlp->setUpdatedAt(new \DateTimeImmutable());
        $this->entityManager->persist($ytdlp);
        $this->entityManager->flush();
    }

}