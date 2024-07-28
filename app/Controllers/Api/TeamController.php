<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Repositories\ITeamRepository;
use Config\Services;

class TeamController extends ApiController
{
    private ITeamRepository $teamRepository;

    public function __construct(?ITeamRepository $teamRepository = null)
    {
        $this->teamRepository = $teamRepository ?? Services::teamRepository();
    }

    public function select(int $id)
    {
        try {
            $value = $this->teamRepository->getById($id);
            return $this->ok($value);
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
