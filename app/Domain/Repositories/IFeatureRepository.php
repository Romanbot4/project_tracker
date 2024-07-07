<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\FeatureEntity;
use App\Domain\Entities\Request\CreateFeatureRequestEntity;

interface IFeatureRepository
{
    public function getById(string $id): FeatureEntity;

    public function list(array $data): array;

    public function create(CreateFeatureRequestEntity $form): FeatureEntity;

    public function remove(int $id);

    public function replace(int $id, CreateFeatureRequestEntity $form): FeatureEntity;

    public function listByProject(int $projectId, array $data): array;
}
