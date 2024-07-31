<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class RemoveUserFromTeamRequestEntity extends RequestEntity
{
    public int $teamId;
    public int $userId;

    protected $rules = [
        "team_id" => "required|numeric",
        "user_id" => "required|numeric",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->teamId = $data['team_id'];
        $this->userId = $data['user_id'];
    }
}
