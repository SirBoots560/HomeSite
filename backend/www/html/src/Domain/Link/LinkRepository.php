<?php
declare(strict_types=1);

namespace App\Domain\Link;

use App\Domain\Repository;
use App\Domain\DBConfig;

class LinkRepository extends Repository
{
    /**
     * @var Links[]
     */
    private $links = [];

    /**
     * LinkRepository constructor.
     *
     * @param array|null $links
     */
    public function __construct(array $links = [])
    {
        DBConfig::connect();
        $result = DBConfig::query("SELECT * FROM links");
        $this->links = [];

        while($row = $result->fetch_array(MYSQLI_ASSOC)){

            //Assigning values from query row to temp variables
            $id = (int) $row['id'];
            $title = $row['title'];
            $location = $row['location'];
            $new_window = (int) $row['new_window'];

            //Constructing a new link from temp variables
            $link = new Link($id, $title, $location, $new_window);

            //Adding new link to links array
            array_push($this->links, $link);
        }
    }

    /**
     * @return Link[]
     */
    public function findAll(): array
    {
        return array_values($this->links);
    }

    /** 
     * @param array $data
     * @return void
     * @throws AddLinkException
     */
    public function addLink(array $data): void
    {
        //Sanitizing form input
        $title = $this->sanitizeString($data['title']);
        $location = $this->sanitizeString($data['location']);
        $new_window = $this->sanitizeInt( (int) $data['new_window']);

        //Preparing MySQL statement
        $statement = "INSERT INTO links VALUES(DEFAULT, '$title', '$location', $new_window)";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new AddLinkException();
        }
    }

    /** 
     * @param array $data
     * @return void
     * @throws LinkNotFoundException
     */
    public function editLink(array $data): void
    {
        //Sanitizing form input
        $id = $this->sanitizeInt( (int) $data['id']);
        $title = $this->sanitizeString($data['title']);
        $location = $this->sanitizeString($data['location']);
        $new_window = $this->sanitizeInt( (int) $data['new_window']);

        //Preparing MySQL statement
        $statement = "UPDATE links SET `title` = '$title', `location` = '$location', `new_window` = '$new_window' WHERE `id` = '$id'";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new LinkNotFoundException();
        }
    }

    /** 
     * @param array $data
     * @return void
     * @throws LinkNotFoundException
     */
    public function deleteLink(int $id): void
    {
        //Sanitizing input
        $id = $this->sanitizeInt( (int) $id);

        //Preparing MySQL statement
        $statement = "DELETE FROM links WHERE `id` = $id";

        //Sanitizing MySQL statement
        $statement = DBConfig::sanitize($statement);

        //Inserting into DB
        $response = DBConfig::query($statement);

        //If insertion fails, throw AddTaskException
        if(!$response){
            throw new LinkNotFoundException();
        }
    }
    
}
