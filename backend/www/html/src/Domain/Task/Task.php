<?php
declare(strict_types=1);

namespace App\Domain\Task;

use JsonSerializable;

class Task implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $category;

    /**
     * @var int
     */
    private $complete;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $category
     * @param int   $complete
     */
    public function __construct(?int $id, string $title, string $category, int $complete)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->complete = $complete;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function getComplete(): int
    {
        return $this->complete;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category,
            'complete' => $this->complete,
        ];
    }
}
