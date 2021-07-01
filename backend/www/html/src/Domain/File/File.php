<?php
declare(strict_types=1);

namespace App\Domain\File;

use JsonSerializable;

class File implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $category;

    /**
     * @param int  $id
     * @param string    $name
     * @param string    $category
     */
    public function __construct(?int $id, string $name, string $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
        ];
    }
}
