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

    protected $attribtes = [
        "id" => null,
        "title" => null,
        "description" => null,
        "endAt" => null,
        "startAt" => null,
        "createdAt" => null,
        "updatedAt" => null,
    ];

    protected $datamap = [
        "startAt" => "start_at",
        "endAt" => "end_at",
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    protected $casts = [
        "id" => "integer",
        "startAt" => "timestamp",
        "endAt" => "timestamp",
        "createdAt" => "timestamp",
        "updatedAt" => "timestamp",
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
