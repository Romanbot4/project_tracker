<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\UserEntity;

interface IUserRepository
{
    public function getById(string $id): UserEntity;
}
