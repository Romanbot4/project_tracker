<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\ProjectEntity;
use App\Domain\Repositories\IProjectRepository;
use App\Domain\Entities\Request\CreateProjectRequestEntity;
use App\Infrastructure\Models\ProjectModel;

class ProjectRepository implements IProjectRepository
{
    private ProjectModel $projectModel;
    public function __construct(ProjectModel $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    public function getById(string $id): ProjectEntity
    {
        return $this->projectModel->getById($id);
    }

    public function list(array $data): array
    {
        return $this->projectModel->list($data);
    }

    public function create(CreateProjectRequestEntity $form): ProjectEntity
    {
        return $this->projectModel->create($form);
    }

    public function remove(int $id)
    {
        return $this->projectModel->remove($id);
    }

    public function replace(int $id, CreateProjectRequestEntity $form): ProjectEntity
    {
        return $this->projectModel->edit($id, $form);
    }
}
