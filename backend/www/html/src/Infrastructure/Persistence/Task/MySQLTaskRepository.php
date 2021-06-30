<?php
  declare(strict_types=1);

namespace App\Infrastructure\Persistence\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskNotFoundException;
use App\Domain\Task\AddTaskException;
use App\Domain\Task\TaskRepository;

class MySQLTaskRepository implements TaskRepository
{
    /**
     * @var Task[]
     */
    private $tasks;

    /**
     * @var mysqli
     */
    private $conn;

    /**
     * MySQLTaskRepository constructor.
     *
     * @param array|null $tasks
     */
    public function __construct(array $tasks = [])
    {
        require_once "config.php";
        $this->conn = $conn; 
        $result = $this->conn->query("SELECT * FROM tasks");
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
        $statement = $this->sanitizeMySQL($statement);

        //Inserting into DB
        $response = $this->conn->query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new AddTaskException();
        }
    }

    /** 
     * @param string $data
     * @return string $data 
     */
    private function sanitizeString(string $data): string
    {
        //Remove space bfore and after
        $data = trim($data); 

        //Remove slashes
        $data = stripslashes($data);

        //Sanitize
        $data=(filter_var($data, FILTER_SANITIZE_STRING));

        return $data;
    }

    /** 
     * @param string $data
     * @return string $data 
     */
    private function sanitizeInt(int $data): int
    {
        //Sanitize
        $data = (int) (filter_var( $data, FILTER_SANITIZE_NUMBER_INT));

        return $data;
    }
    
    /** 
     * @param string $statement
     * @return string $statement
     */
    private function sanitizeMySQL(string $statement): string
    {
        //Real escape string
        $statement = $this->conn->real_escape_string($statement);

        //Remove slashes
        $statement = stripslashes($statement);

        return $statement;
    }
}