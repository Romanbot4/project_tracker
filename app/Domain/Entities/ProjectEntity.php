<?php

namespace App\Domain\Entities;

use DateTime;

class ProjectEntity extends BaseEntity
{
    public int $id;
    public string $title;
    public string $description;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    protected $attribtes = [
        "id" => null,
        "title" => null,
        "description" => null,
        "createdAt" => null,
        "updatedAt" => null,
    ];

    protected $datamap = [
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    protected $casts = [
        "id" => "integer",
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
    }
}
