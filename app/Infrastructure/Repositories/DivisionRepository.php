<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\DivisionEntity;
use App\Domain\Repositories\IDivisionRepository;
use App\Domain\Entities\Request\CreateDivisionRequestEntity;
use App\Infrastructure\Models\DivisionModel;

class DivisionRepository implements IDivisionRepository
{
    private DivisionModel $divisionModel;
    public function __construct(DivisionModel $divisionModel)
    {
        $this->divisionModel = $divisionModel;
    }

    public function getById(string $id): DivisionEntity
    {
        return $this->divisionModel->getById($id);
    }

    public function list(array $data): array
    {
        return $this->divisionModel->list($data);
    }

    public function create(CreateDivisionRequestEntity $form): DivisionEntity
    {
        return $this->divisionModel->create($form);
    }

    public function remove(int $id)
    {
        return $this->divisionModel->remove($id);
    }

    public function replace(int $id, CreateDivisionRequestEntity $form): DivisionEntity
    {
        return $this->divisionModel->edit($id, $form);
    }
}
