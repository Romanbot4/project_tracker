<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class  CommitTypeEntity extends Entity
{
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
}
