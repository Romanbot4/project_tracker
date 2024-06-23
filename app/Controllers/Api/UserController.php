<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Repositories\IUserRepository;
use CodeIgniter\HTTP\ResponseInterface;
use \Config\Services;

class UserController extends ApiController
{
    protected IUserRepository $userRepository;
    public function __construct(IUserRepository $userRepository = null)
    {
        $this->userRepository = $userRepository ?? Services::userRepository();
    }

    public function getById(string $id): ResponseInterface
    {
        try {
            return $this->ok($this->userRepository->getById($id));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
