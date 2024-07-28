<?php

namespace App\Domain\Entities;

use App\Domain\Entities\UserEntity;
use App\Domain\Enums\TeamRole;

class TeamUserEntity extends UserEntity
{
    public TeamRole $role;
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->role = TeamRole::parse($data["role"]);
        $this->casts = [
            ...$this->casts,
            "team_id" => "integer",
            "user_id" => "integer"
        ];
        $this->hiddenFields = [
            ...$this->hiddenFields,
            "user_id",
            "team_id",
        ];
    }
}
