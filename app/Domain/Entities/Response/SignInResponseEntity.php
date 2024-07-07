<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\BaseEntity;
use App\Domain\Entities\UserEntity;

class SignInResponseEntity extends BaseEntity
{
    public UserEntity $user;
    public AccessTokenResponseEntity $autorization;

    public function __construct(UserEntity $user, AccessTokenResponseEntity $authorization)
    {
        parent::__construct([
            "user" => $user,
            "authorization" => $authorization,
        ]);
        $this->user = $user;
        $this->authorization = $authorization;
    }
}
