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
}
