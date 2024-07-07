<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\SignUpRequestEntity;
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

    public function list(): ResponseInterface
    {
        try {
            $pagination = $this->request->getGet();
            return $this->ok($this->userRepository->list((array) $pagination));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function add()
    {
        try {
            $form = new SignUpRequestEntity ((array) $this->request->getJSON());
            return $this->ok($this->userRepository->create($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
