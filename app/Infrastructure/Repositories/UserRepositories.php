<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\UserEntity;
use App\Domain\Repositories\IUserRepository;
use Exception;

class UserRepository implements IUserRepository
{
    public function create(array $data): UserEntity
    {
        throw new Exception("Not implemented");
    }

    public function list(int $page, int $limit): array
    {
        throw new Exception("Not implemented");
    }

    public function getById(int $id): UserEntity
    {
        throw new Exception("Not implemented");
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
