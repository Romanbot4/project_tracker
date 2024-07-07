<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Domain\Entities\UpdateUserRequestEntity;
use App\Domain\Entities\UserEntity;

interface IUserRepository
{
    public function getById(string $id): UserEntity;

    public function getByEmail(string $email): UserEntity;

    public function list(array $data): array;

    public function create(SignUpRequestEntity $form): UserEntity;

    public function delete(int $id);

    public function update(int $id, UpdateUserRequestEntity $form): UserEntity;
}
