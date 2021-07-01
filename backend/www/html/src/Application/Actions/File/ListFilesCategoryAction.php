<?php
declare(strict_types=1);

namespace App\Application\Actions\File;

use Psr\Http\Message\ResponseInterface as Response;

class ListFilesCategoryAction extends FileAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $category = $this->resolveArg('category');

        $tasks = $this->fileRepository->findFilesOfCategory($category);

        $this->logger->info("Files of category `${category}` were viewed.");
        
        return $this->respondWithData($tasks);
    }
}
