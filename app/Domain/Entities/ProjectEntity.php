<?php

namespace App\Domain\Entities;

use DateTime;

class ProjectEntity extends BaseEntity
{
    public int $id;
    public string $title;
    public string $description;
    public DateTime $startAt;
    public DateTime $endAt;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    protected $casts = [
        "id" => "integer",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->createdAt = new DateTime($data["created_at"]);
        $this->updatedAt = new DateTime($data["updated_at"]);
        $this->startAt = new DateTime($data["start_at"]);
        $this->endAt = new DateTime($data["end_at"]);
    }
}
