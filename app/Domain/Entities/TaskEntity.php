<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class TaskEntity  extends Entity
{
    protected $attributes = [
        "id" => null,
        "title" => null,
        "progress" => null,
        "featureId" => null,
        "projectId" => null,
        "commitTypeId" => null,
        "updatedAt" => null,
        "createdAt" => null,
    ];

    protected $datamap = [
        "featureId" => "feature_id",
        "projectId" => "project_id",
        "commitTypeId" => "commit_type_id",
        "updatedAt" => "updated_at",
        "createdAt" => "created_at",
    ];

    protected $casts = [
        "id" => "integer",
        "progress" => "double",
        "featureId" => "integer",
        "projectId" => "integer",
        "commitTypeId" => "commit_type_id",
        "updatedAt" => "updated_at",
        "createdAt" => "created_at",
    ];
}
