<?php
declare(strict_types=1);

namespace App\Domain\Link;

use JsonSerializable;

class Link implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $location;

    /**
     * @var int
     */
    private $new_window;

    /**
     * @param int  $id
     * @param string    $title
     * @param string    $category
     * @param int   $new_window
     */
    public function __construct(?int $id, string $title, string $location, int $new_window)
    {
        $this->id = $id;
        $this->title = $title;
        $this->location = $location;
        $this->new_window = $new_window;
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
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getNewWindow(): int
    {
        return $this->new_window;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'location' => $this->location,
            'new_window' => $this->new_window,
        ];
    }
}
