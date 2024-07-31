<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\AddUserToTeamRequestEntity;
use App\Domain\Entities\Request\CreateTeamRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\RemoveUserFromTeamRequestEntity;
use App\Domain\Repositories\ITeamRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class TeamController extends ApiController
{
    private ITeamRepository $teamRepository;

    public function __construct(?ITeamRepository $teamRepository = null)
    {
        $this->teamRepository = $teamRepository ?? Services::teamRepository();
    }

    public function addUserToTeam()
    {
        try {
            $form = new AddUserToTeamRequestEntity($this->request->getJSON(true));
            return $this->ok($this->teamRepository->addUserToTeam($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function removeUserFromTeam()
    {
        try {
            $form = new RemoveUserFromTeamRequestEntity($this->request->getJSON(true));
            return $this->ok($this->teamRepository->removeUserFromTeam($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }


    public function create(): ResponseInterface
    {
        try {
            $form = new CreateTeamRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->teamRepository->create($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function replace(int $id): ResponseInterface
    {
        try {
            $form = new CreateTeamRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->teamRepository->replace($id, $form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function remove(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->teamRepository->remove($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function list(): ResponseInterface
    {
        try {
            $pageRequest = new PaginationRequestEntity((array)$this->request->getGet());
            $res = $this->teamRepository->list($pageRequest);
            return $this->ok($res);
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function select(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->teamRepository->getById($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
