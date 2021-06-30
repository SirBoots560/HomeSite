<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use Psr\Http\Message\ResponseInterface as Response;

class AddTaskAction extends TaskAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $data = $this->getFormData();

        $this->taskRepository->addTask($data);

        $this->logger->info("A task was added.");

        return $this->respondWithData();
    }
}
