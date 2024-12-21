<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class FileManager
{

    private string $projectDir;

    public function __construct(string $projectDir) {

        $this->projectDir = $projectDir;
    }

    public function getAbsolutePath(string $path): string
    {
        return $this->projectDir . DIRECTORY_SEPARATOR . $path;
    }

    public function deleteFolder(string $folderPath): bool
    {
        if (!is_dir($folderPath)) {
            return false;
        }

        $files = array_diff(scandir($folderPath), ['.', '..']);
        foreach ($files as $file) {
            $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
            if (is_dir($filePath)) {
                $this->deleteFolder($filePath);
            } else {
                unlink($filePath);
            }
        }

        return rmdir($folderPath);
    }

    public function deleteFile(string $filePath): bool
    {
        if (!is_file($filePath)) {
            return false;
        }
        return unlink($filePath);
    }

    public function createDirectory(string $path): void {
        $absolutePath = $this->getAbsolutePath('data' . $path);
        //dd($absolutePath);
        if (!file_exists($absolutePath) && !mkdir($absolutePath, 0777, true) && !is_dir($absolutePath)) {
            throw new \RuntimeException(sprintf('Le répertoire "%s" n\'a pas pu être créé.', $absolutePath));
        }
    }

    public function isWritable(string $path): void {
        $absolutePath = $this->getAbsolutePath('data' . $path);
        if (!is_writable($absolutePath)) {
            throw new \RuntimeException(sprintf('Le répertoire "%s" n\'est pas accessible en écriture.', $absolutePath));
        }
    }
}
