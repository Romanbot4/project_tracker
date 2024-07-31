<?php

namespace  App\Domain\Repositories;

use App\Domain\Entities\PaginatedResponseEntity;
use App\Domain\Entities\Request\AddUserToTeamRequestEntity;
use App\Domain\Entities\Request\CreateTeamRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\RemoveUserFromTeamRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use App\Domain\Entities\TeamDetailsEntity;

interface ITeamRepository
{
    public function getById(string $id): TeamDetailsEntity;
    public function addUserToTeam(AddUserToTeamRequestEntity $form): SuccessResponseEntity;
    public function removeUserFromTeam(RemoveUserFromTeamRequestEntity $form): SuccessResponseEntity;

    public function list(PaginationRequestEntity $data): PaginatedResponseEntity;
    public function getRowCount(): int;
    public function create(CreateTeamRequestEntity $form): TeamDetailsEntity;
    public function remove(int $id);
    public function removeByIds(array $ids);
    public function replace(int $id, CreateTeamRequestEntity $form): TeamDetailsEntity;
}
