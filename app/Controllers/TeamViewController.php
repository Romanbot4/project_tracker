<?php

namespace App\Controllers;

use App\Core\Failures\BadRequestFailure;
use App\Domain\Entities\Request\CreateTeamRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\UserEntity;
use App\Infrastructure\Repositories\TeamRepository;
use CodeIgniter\Session\Session;
use Config\Services;

helper("svg_icon");
helper("pagination");

class TeamViewController extends BaseController
{
    private Session $session;
    private ?UserEntity $user;
    private TeamRepository $teamRepository;
    public function __construct(?TeamRepository $teamRepository = null)
    {
        $this->session = Services::session();
        $this->teamRepository = $teamRepository ?? Services::teamRepository();
        $this->user = $this->session->get("user");
    }

    public function teams(): string
    {
        $pageReq = new PaginationRequestEntity((array) $this->request->getGet());
        $teams = $this->teamRepository->list($pageReq);
        return view('teams', [
            'user' => $this->user,
            'teams' => $teams->data,
            'paginations' => get_paginated_links($teams, base_url("teams")),
            'limit' => $pageReq->limit,
            'page' => $pageReq->page,
        ]);
    }

    public function createTeam()
    {
        return view("create_team", ['user' => $this->user]);
    }

    public function removeByIdsRequest()
    {
        $ids = $this->request->getPost()["items"] ?? [];
        $this->teamRepository->removeByIds($ids);
        return redirect("teams");
    }

    public function deleteById(int $id)
    {
        $this->teamRepository->remove($id);
        return redirect("teams");
    }

    public function createTeamRequest()
    {
        try {
            $team = new CreateTeamRequestEntity((array) $this->request->getPost());
            $this->teamRepository->create($team);
            return redirect("teams");
        } catch (BadRequestFailure $failure) {
            return view("create_team", [
                "errors" => $failure->errors,
            ]);
        }
    }

    public function teamCards() {
        $req = new PaginationRequestEntity(
            (array)  $this->request->getGet(),
        );
        $res = $this->teamRepository->list($req);
        foreach($res->data as $item) {
            echo view('components/card/team_card', (array) $item);
        }
    }
}
