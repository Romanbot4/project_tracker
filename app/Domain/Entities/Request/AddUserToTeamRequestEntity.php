<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;
use App\Domain\Enums\TeamRole;

class AddUserToTeamRequestEntity extends RequestEntity
{
    public int $teamId;
    public int $userId;
    public TeamRole $role;

    protected $rules = [
        "team_id" => "required|numeric",
        "user_id" => "required|numeric",
        "role" => "required|alpha|min_length[3]"
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->teamId = $data['team_id'];
        $this->userId = $data['user_id'];
        $this->role = $data['role'];
    }
}
