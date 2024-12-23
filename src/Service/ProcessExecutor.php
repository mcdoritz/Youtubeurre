<?php

namespace App\Service;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ProcessExecutor {

    public function execute(array $command): string
    {
        $process = new Process($command);
        $process->run();

        // Retourne toujours la sortie, même si la commande échoue
        return $process->isSuccessful() ? $process->getOutput() : $process->getErrorOutput();
    }

}