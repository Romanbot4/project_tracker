<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Domain\Entities\UpdateUserRequestEntity;
use App\Domain\Entities\UserEntity;
use App\Domain\Repositories\IUserRepository;
use App\Infrastructure\Models\UserModel;

class UserRepository implements IUserRepository
{
    protected UserModel $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getById(string $id): UserEntity
    {
        return $this->userModel->getById($id);
    }

    public function getByEmail(string $email): UserEntity
    {
        return $this->userModel->getByEmail($email);
    }

    public function list(array $data): array
    {
        return $this->userModel->list($data);
    }

    public function create(SignUpRequestEntity $form): UserEntity
    {
        return  $this->userModel->create($form);
    }

    public function remove(int $id)
    {
        return $this->userModel->delete($id);
    }

    public function replace(int $id, UpdateUserRequestEntity $form): UserEntity
    {
        return $this->replace($id, $form);
    }
}
