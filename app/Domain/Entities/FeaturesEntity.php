<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class FeatureEntity extends Entity
{
    protected $attributes = [
        "id" => null,
        "title" => null,
        "projectId" => null,
        "createdAt" => null,
        "updatedAt" => null,
    ];

    protected $datamap = [
        "projectId" => "project_id",
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    protected $casts = [
        "id" => "integer",
        "updatedAt" => "timestamp",
        "createdAt" => "timestamp",
    ];
}
