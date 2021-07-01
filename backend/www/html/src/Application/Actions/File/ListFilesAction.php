<?php
declare(strict_types=1);

namespace App\Application\Actions\File;

use Psr\Http\Message\ResponseInterface as Response;

class ListFilesAction extends FileAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $files = $this->fileRepository->findAll();

        $this->logger->info("Files list was viewed.");
        
        return $this->respondWithData($files);
    }
}
