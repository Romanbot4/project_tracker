<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\CreateFeatureRequestEntity;
use App\Domain\Repositories\IFeatureRepository;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class FeatureController extends ApiController
{
    private IFeatureRepository $featureRepository;

    public function __construct(IFeatureRepository $featureRepository = null)
    {
        $this->featureRepository = $featureRepository ?? Services::featureRepository();
    }

    public function create(): ResponseInterface
    {
        try {
            $form = new CreateFeatureRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->featureRepository->create($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function replace(int $id): ResponseInterface
    {
        try {
            $form = new CreateFeatureRequestEntity((array) $this->request->getJSON());
            return $this->ok($this->featureRepository->replace($id, $form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function remove(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->featureRepository->remove($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function list(): ResponseInterface
    {
        try {
            return $this->ok($this->featureRepository->list($this->request->getGet()));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function select(int $id): ResponseInterface
    {
        try {
            return $this->ok($this->featureRepository->getById($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function listByProject(int $projectId): ResponseInterface
    {
        try {
            return $this->ok($this->featureRepository->listByProject($projectId, $this->request->getGet()));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
