<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use Psr\Http\Message\ResponseInterface as Response;

class ListTasksCategoryAction extends TaskAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $category = $this->resolveArg('category');

        $tasks = $this->taskRepository->findTasksOfCategory($category);

        $this->logger->info("Tasks of category `${category}` was viewed.");
        
        return $this->respondWithData($tasks);
    }
}
