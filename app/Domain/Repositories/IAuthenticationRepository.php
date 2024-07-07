<?php

namespace App\Domain\Repositories;
use App\Domain\Entities\Request\SignInRequestEntity;
use App\Domain\Entities\Response\SignInResponseEntity;
use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Domain\Entities\Response\AccessTokenResponseEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;

interface IAuthenticationRepository
{
    public function signIn(SignInRequestEntity $form): SignInResponseEntity;

    public function signUp(SignUpRequestEntity $form): SuccessResponseEntity;

    public function refreshToken(string $refreshToken): AccessTokenResponseEntity;

    public function verifyToken(string $accessToken) : bool;
}
