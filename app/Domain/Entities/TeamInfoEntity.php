<?php

namespace App\Domain\Entities;

use DateTime;

class TeamInfoEntity extends BaseEntity
{
    public int $id;
    public string $title;
    public string $description;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    protected $hiddenFields = [
        "created_at",
        "updated_at",
    ];

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
    }
}
