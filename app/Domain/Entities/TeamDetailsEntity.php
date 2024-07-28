<?php

namespace App\Domain\Entities;

use App\Domain\Entities\TeamInfoEntity;
use CodeIgniter\Entity\Entity;

class TeamDetailsEntity extends Entity
{
    public TeamInfoEntity $team;
    public array $users;

    public function __construct(TeamInfoEntity $team, array $users)
    {
        parent::__construct([
            "team" => $team,
            "users" => $users,
        ]);
        $this->team = $team;
        $this->users = $users;
    }
}
