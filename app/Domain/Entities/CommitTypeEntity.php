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

    protected $hiddenFields = [
        "updated_at",
        "created_at",
    ];

    protected $casts = [
        "id" => "integer",
        "division_id" => "integer",
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
