<?php
declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\Repository;

abstract class TaskRepository extends Repository
{
    /**
     * @param string $category
     * @return Task[]
     */
    abstract public function findTasksOfCategory(string $category, string $complete): array;

    /** 
     * @param array $data
     * @return void
     * @throws AddTaskException
     */
    abstract public function addTask(array $data): void;

    /** 
     * @param array $data
     * @return void
     * @throws TaskNotFoundException
     */
    abstract public function deleteTask(int $id): void;

    /** 
     * @param array $data
     * @return void
     * @throws TaskNotFoundException
     */
    abstract public function completeTask(int $id): void;

}
