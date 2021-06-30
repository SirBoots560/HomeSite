<?php
  declare(strict_types=1);

namespace App\Infrastructure\Persistence\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskNotFoundException;
use App\Domain\Task\AddTaskException;
use App\Domain\Task\TaskRepository;
use App\Infrastructure\Persistence\DBConfig;

class MySQLTaskRepository extends TaskRepository
{
    /**
     * @var Task[]
     */
    private $tasks = [];

    /**
     * MySQLTaskRepository constructor.
     *
     * @param array|null $tasks
     */
    public function __construct(array $tasks = [])
    {
        DBConfig::connect();
        $result = DBConfig::query("SELECT * FROM tasks");
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
            array_push($this->tasks, $task);
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
    public function findTasksOfCategory(string $category, string $complete): array
    {
        $filteredTasks = [];

        $category = strtolower($category);

        if(strcmp('all', $category) == 0){
            $filteredTasks = $this->tasks;
        } else {
            foreach($this->tasks as $task){
                if(strcmp(strtolower($task->getCategory()), $category) == 0){
                    array_push($filteredTasks, $task); 
                }
            }
        }

        if(strcmp($complete, 'true')){

            $temp = $filteredTasks;

            $filteredTasks = [];

            foreach($temp as $val){
                if($val->getComplete() == 0){
                    array_push($filteredTasks, $val);
                }
            }
        }

       return $filteredTasks;
    }	

    /**
     * {@inheritdoc}
     */
    public function addTask(array $data): void
    {
        //Sanitizing form input
        $title = $this->sanitizeString($data['title']);
        $category = $this->sanitizeString($data['category']);
        $complete = $this->sanitizeInt( (int) $data['complete']);

        //Preparing MySQL statement
        $statement = "INSERT INTO tasks VALUES(DEFAULT, '$title', '$category', $complete)";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new AddTaskException();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function deleteTask(int $id): void
    {
        //Sanitizing input
        $id = $this->sanitizeInt( (int) $id);

        //Preparing MySQL statement
        $statement = "DELETE FROM tasks WHERE `id` = $id";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new TaskNotFoundException();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function completeTask(int $id): void
    {
        //Sanitizing input
        $id = $this->sanitizeInt( (int) $id);

        //Preparing MySQL statement
        $statement = "UPDATE tasks SET `complete` = 1 WHERE `id` = $id";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new TaskNotFoundException();
        }
    }
}