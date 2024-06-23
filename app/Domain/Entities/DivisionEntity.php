<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class DivisionEntity extends Entity
{
    protected $attributes = [
        "id" => null,
        "title" => null,
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
