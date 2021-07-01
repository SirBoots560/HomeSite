<?php
  declare(strict_types=1);

namespace App\Infrastructure\Persistence\Link;

use App\Domain\Link\Link;
use App\Domain\Link\LinkRepository;
use App\Infrastructure\Persistence\DBConfig;

class MySQLLinkRepository extends LinkRepository
{
    /**
     * @var Links[]
     */
    private $links = [];

    /**
     * MySQLLinkRepository constructor.
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

            //Constructing a new task from temp variables
            $link = new Link($id, $title, $location, $new_window);

            //Adding new task to tasks array
            array_push($this->links, $link);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addLink()
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->links);
    }
}