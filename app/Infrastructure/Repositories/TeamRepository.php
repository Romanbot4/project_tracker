<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ITeamRepository;
use App\Domain\Entities\TeamDetailsEntity;
use App\Infrastructure\Models\TeamModel;

class TeamRepository implements ITeamRepository
{
    private TeamModel $teamModel;

    public function __construct(?TeamModel $teamModel = null)
    {
        $this->teamModel = $teamModel ?? new TeamModel();
    }
    public function getById(string $id): TeamDetailsEntity
    {
        return $this->teamModel->getById($id);
    }

    public function addUserToTeam(string $id): bool
    {
        return $this->teamModel->addUserToTeam($id);
    }
}
