<?php
declare(strict_types=1);

namespace App\Domain\File;

use App\Domain\Repository;
use App\Domain\DBConfig;

class FileRepository extends Repository
{
    /**
     * @var Files[]
     */
    private $files = [];

    /**
     * FileRepository constructor.
     *
     * @param array|null $files
     */
    public function __construct(array $files = [])
    {
        DBConfig::connect();
        $result = DBConfig::query("SELECT * FROM files");
        $this->files = [];

        while($row = $result->fetch_array(MYSQLI_ASSOC)){

            //Assigning values from query row to temp variables
            $id = (int) $row['id'];
            $name = $row['name'];
            $category = $row['category'];

            //Constructing a new file from temp variables
            $file = new File($id, $name, $category);

            //Adding new file to files array
            array_push($this->files, $file);
        }
    }

    /**
     * @return File[]
     */
    public function findAll(): array
    {
        return array_values($this->files);
    }
}
