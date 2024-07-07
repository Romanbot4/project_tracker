<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\IUserCredentialRepository;
use App\Infrastructure\Models\UserCredentialModel;

class UserCredentialRepository implements IUserCredentialRepository
{
    protected UserCredentialModel $userCredentialModel;
    public function __construct(UserCredentialModel $userCredentialModel)
    {
        $this->userCredentialModel = $userCredentialModel;
    }

    public function create(int $userId, string $password): string
    {
        $passwordHash = md5($password);
        return $this->userCredentialModel->create($userId, $passwordHash);
    }

    public function verify(int $userId, string $password): bool
    {
        $passwordHash = md5($password);
        $savedPassword = $this->userCredentialModel->getByUserId($userId);
        return $savedPassword === $passwordHash;
    }
}
