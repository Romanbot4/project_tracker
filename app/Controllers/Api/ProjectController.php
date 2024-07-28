<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\PaginatedResponseEntity;
use App\Domain\Entities\Request\CreateProjectRequestEntity;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Repositories\IProjectRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

helper("pagination");

class ProjectController extends ApiController
{
    private IProjectRepository $projectRepository;

    public function __construct(IProjectRepository $projectRepository = null)
    {
        $this->projectRepository = $projectRepository ?? Services::projectRepository();
    }

    public function create(): ResponseInterface
    {
        try {
            $form = new CreateProjectRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->projectRepository->create($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function replace(int $id): ResponseInterface
    {
        try {
            $form = new CreateProjectRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->projectRepository->replace($id, $form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function remove(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->projectRepository->remove($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function list(): ResponseInterface
    {
        try {
            $pageRequest = new PaginationRequestEntity((array)$this->request->getGet());
            $res = $this->projectRepository->list($pageRequest);
            return $this->ok($res);
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function select(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->projectRepository->getById($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
