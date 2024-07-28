<?php

namespace  App\Domain\Repositories;

use App\Domain\Entities\TeamDetailsEntity;

interface ITeamRepository
{
    public function getById(string $id): TeamDetailsEntity;
    public function addUserToTeam(string $id): bool;
}
