<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\ProjectEntity;
use App\Domain\Entities\Request\CreateProjectRequestEntity;

interface IProjectRepository
{
    public function getById(string $id): ProjectEntity;

    public function list(array $data): array;

    public function create(CreateProjectRequestEntity $form): ProjectEntity;

    public function remove(int $id);

    public function removeByIds(array $ids);

    public function replace(int $id, CreateProjectRequestEntity $form): ProjectEntity;
}
