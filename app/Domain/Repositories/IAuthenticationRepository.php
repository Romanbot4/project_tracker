<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Request\SignInRequestEntity;
use App\Domain\Entities\Response\SignInResponseEntity;
use App\Domain\Request\SignUpRequestEntity;

interface IAuthenticationRepository
{
    public function signIn(SignInRequestEntity $form): SignInResponseEntity;

    public function signUp(SignUpRequestEntity $form): SignInResponseEntity;
}
