<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    protected $attributes = [
        "id" => null,
        "name" => null,
        "credential" => null,
        "updatedAt" => null,
        "createdAt" => null,
    ];

    protected $datamap = [
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    protected $casts = [
        // "id" => "",
        // "createdAt" => "integer",
        // "updateAt" => "integer",
    ];
}
