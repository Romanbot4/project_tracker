<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\CreateDivisionRequestEntity;
use App\Domain\Repositories\IDivisionRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DivisionController extends ApiController
{
    private IDivisionRepository $divisionRepository;

    public function __construct(IDivisionRepository $divisionRepository = null)
    {
        $this->divisionRepository = $divisionRepository ?? Services::divisionRepository();
    }

    public function create(): ResponseInterface
    {
        try {
            $form = new CreateDivisionRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->divisionRepository->create($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function replace(int $id): ResponseInterface
    {
        try {
            $form = new CreateDivisionRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->divisionRepository->replace($id, $form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function remove(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->divisionRepository->remove($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function list(): ResponseInterface
    {
        try {
            return $this->ok($this->divisionRepository->list($this->request->getGet()));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function select(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->divisionRepository->getById($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
