<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\FeatureEntity;
use App\Domain\Repositories\IFeatureRepository;
use App\Domain\Entities\Request\CreateFeatureRequestEntity;
use App\Infrastructure\Models\FeatureModel;

class FeatureRepository implements IFeatureRepository
{
    private FeatureModel $featureModel;
    public function __construct(FeatureModel $featureModel)
    {
        $this->featureModel = $featureModel;
    }

    public function getById(string $id): FeatureEntity
    {
        return $this->featureModel->getById($id);
    }

    public function list(array $data): array
    {
        return $this->featureModel->list($data);
    }

    public function listByProject(int $projectId, array $data): array
    {
        return $this->featureModel->listByProject($projectId, $data);
    }

    public function create(CreateFeatureRequestEntity $form): FeatureEntity
    {
        return $this->featureModel->create($form);
    }

    public function remove(int $id)
    {
        return $this->featureModel->remove($id);
    }

    public function replace(int $id, CreateFeatureRequestEntity $form): FeatureEntity
    {
        return $this->featureModel->edit($id, $form);
    }
}
