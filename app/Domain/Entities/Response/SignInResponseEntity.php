<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\AuthorizationEntity;
use App\Domain\Entities\UserEntity;
use CodeIgniter\Entity\Entity;

class SignInResponseEntity extends Entity
{
    public UserEntity $user;
    public AuthorizationEntity $autorization;

    public function __construct(UserEntity $user, AuthorizationEntity $authorization)
    {
        $this->user = $user;
        $this->authorization = $authorization;
    }
}
