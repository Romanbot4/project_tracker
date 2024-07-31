<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\PaginatedResponseEntity;
use App\Domain\Entities\Request\AddUserToTeamRequestEntity;
use App\Domain\Entities\Request\CreateTeamRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\RemoveUserFromTeamRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
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

    public function addUserToTeam(AddUserToTeamRequestEntity $request): SuccessResponseEntity
    {
        return $this->teamModel->addUserToTeam($request);
    }

    public function removeUserFromTeam(RemoveUserFromTeamRequestEntity $form): SuccessResponseEntity
    {
        return $this->teamModel->removeUserFromTeam($form);
    }

    public function list(PaginationRequestEntity $req): PaginatedResponseEntity
    {
        $count = $this->getRowCount();
        $data = $this->teamModel->list($req);
        return  new PaginatedResponseEntity(
            $data,
            $req->limit,
            $req->page,
            $count,
        );
    }

    public function getRowCount(): int
    {
        return $this->teamModel->getRowCount();
    }

    public function create(CreateTeamRequestEntity $form): TeamDetailsEntity
    {
        return $this->teamModel->create($form);
    }

    public function remove(int $id)
    {
        return $this->teamModel->remove($id);
    }

    public function removeByIds(array $ids)
    {
        return $this->teamModel->removeByIds($ids);
    }

    public function replace(int $id, CreateTeamRequestEntity $form): TeamDetailsEntity
    {
        return $this->teamModel->edit($id, $form);
    }
}
