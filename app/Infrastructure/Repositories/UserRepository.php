<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\UserEntity;
use App\Domain\Repositories\IUserRepository;
use App\Infrastructure\Models\UserModel;
use Exception;

class UserRepository implements IUserRepository
{
    protected UserModel $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function create(array $data): UserEntity
    {
        throw new Exception("Not implemented");
    }

    public function list(int $page, int $limit): array
    {
        throw new Exception("Not implemented");
    }

    public function getById(string $id): UserEntity
    {
        return $this->userModel->getById($id);
    }

    public function update(int $id, array $data): UserEntity
    {
        throw new Exception("Not implemented");
    }

    public function delete(int $id): UserEntity
    {
        throw new Exception("Not implemented");
    }
}
