<?php
declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\Repository;

abstract class TaskRepository extends Repository
{
    /**
     * @param int $id
     * @return Task
     * @throws TaskNotFoundException
     */
    abstract public function findTaskOfId(int $id): Task;

    /** 
     * @param array $data
     * @return void
     * @throws AddTaskException
     */
    abstract public function addTask(array $data): void;

}
