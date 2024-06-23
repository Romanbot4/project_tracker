<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class ProjectEntity extends Entity
{
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
}
