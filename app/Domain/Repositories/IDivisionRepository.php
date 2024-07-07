<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\DivisionEntity;
use App\Domain\Entities\Request\CreateDivisionRequestEntity;

interface IDivisionRepository
{
    public function getById(string $id): DivisionEntity;

    public function list(array $data): array;

    public function create(CreateDivisionRequestEntity $form): DivisionEntity;

    public function remove(int $id);

    public function replace(int $id, CreateDivisionRequestEntity $form): DivisionEntity;
}
