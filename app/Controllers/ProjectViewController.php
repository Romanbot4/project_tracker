<?php

namespace App\Controllers;

use App\Core\Failures\BadRequestFailure;
use App\Domain\Entities\Request\CreateProjectRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\UserEntity;
use App\Infrastructure\Repositories\ProjectRepository;
use CodeIgniter\Session\Session;
use Config\Services;

helper("svg_icon");
helper("pagination");

class ProjectViewController extends BaseController
{
    private Session $session;
    private ?UserEntity $user;
    private ProjectRepository $projectRepository;
    public function __construct(?ProjectRepository $projectRepository = null)
    {
        $this->session = Services::session();
        $this->projectRepository = $projectRepository ?? Services::projectRepository();
        $this->user = $this->session->get("user");
    }

    public function projects(): string
    {
        $pageReq = new PaginationRequestEntity((array) $this->request->getGet());
        $projects = $this->projectRepository->list($pageReq);
        return view('projects', [
            'user' => $this->user,
            'projects' => $projects->data,
            'paginations' => get_paginated_links($projects, base_url("projects")),
            'limit' => $pageReq->limit,
            'page' => $pageReq->page,
        ]);
    }

    public function createProject()
    {
        return view("create_project", ['user' => $this->user]);
    }


    public function removeByIdsRequest()
    {
        $ids = $this->request->getPost()["items"] ?? [];
        $this->projectRepository->removeByIds($ids);
        return redirect("projects");
    }

    public function createProjectRequest()
    {
        try {
            $project = new CreateProjectRequestEntity((array) $this->request->getPost());
            $this->projectRepository->create($project);
            return redirect("projects");
        } catch (BadRequestFailure $failure) {
            return view("create_project", [
                "errors" => $failure->errors,
            ]);
        }
    }
}
