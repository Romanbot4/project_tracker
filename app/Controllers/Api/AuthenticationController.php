<?php

namespace App\Controllers\Api;

use App\Controllers\ApiController;
use App\Domain\Entities\Request\SignInRequestEntity;
use App\Domain\Entities\Request\SignUpRequestEntity as RequestSignUpRequestEntity;
use App\Domain\Repositories\IAuthenticationRepository;

class AuthenticationController extends ApiController
{
    protected IAuthenticationRepository $authenticationRepository;
    public function __construct(UserController $authenticationRepository = null)
    {
        $this->authenticationRepository = $authenticationRepository ?? \Config\Services::authenticationRepository();
    }

    public function signUp()
    {
        try {
            $data = $this->request->getJSON(true);
            $form = new RequestSignUpRequestEntity((array) $data);
            return $this->respond($this->authenticationRepository->signUp($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }

    public function signIn()
    {
        try {
            $data = $this->request->getJSON(true);
            $form = new SignInRequestEntity((array) $data);
            return $this->ok($this->authenticationRepository->signIn($form));
        } catch (\Throwable $th) {
            return $this->resolve($th);
        }
    }
}
