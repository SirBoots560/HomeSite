<?php
  declare(strict_types=1);

namespace App\Infrastructure\Persistence\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskNotFoundException;
use App\Domain\Task\TaskRepository;

class MySQLTaskRepository implements TaskRepository
{
    /**
     * @var Task[]
     */
    private $tasks;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $tasks
     */
    public function __construct(array $tasks = [])
    {
        require_once "config.php";
        $result = $conn->query("SELECT * FROM tasks");
        $this->tasks = [];

        while($row = $result->fetch_array(MYSQLI_ASSOC)){

            //Assigning values from query row to temp variables
            $id = (int) $row['id'];
            $title = $row['title'];
            $category = $row['category'];
            $complete = (int) $row['complete'];

            //Constructing a new task from temp variables
            $task = new Task($id, $title, $category, $complete);

            //Adding new task to tasks array
            $this->tasks[$id] = $task;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->tasks);
    }

    /**
     * {@inheritdoc}
     */
    public function findTaskOfId(int $id): Task
    {
        if (!isset($this->tasks[$id])) {
            throw new TaskNotFoundException();
        }

        return $this->tasks[$id];
    }
}