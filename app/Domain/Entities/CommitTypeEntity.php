<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;
use DateTime;

class CommitTypeEntity extends Entity
{
    public int $id;
    public string $title;
    public int $divisionId;
    public DateTime $updatedAt;
    public DateTime $createdAt;

    protected $attributes = [
        "id" => null,
        "title" => null,
        "divisionId" => null,
        "updatedAt" => null,
        "createdAt" => null,
    ];

    protected $datamap = [
        "divisionId" => "division_id",
        "updatedAt" => "updated_at",
        "createdAt" => "created_at",
    ];

    protected $casts = [
        "id" => "integer",
        "division_id" => "integer",
        "updatedAt" => "timestamp",
        "createdAt" => "timestamp",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->divisionId = $data["division_id"];
        $this->createdAt = $data["created_at"];
        $this->updatedAt = $data["updated_at"];
    }
}
