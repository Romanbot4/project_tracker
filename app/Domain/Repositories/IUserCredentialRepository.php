<?php

namespace App\Domain\Repositories;

interface IUserCredentialRepository
{
    public function create(int $userId, string $password) : string;

    public function verify(int $userId, string $passwordHash) : bool;
}
