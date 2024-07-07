<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Response\AccessTokenResponseEntity;
use App\Domain\Entities\UserEntity;

interface ITokenRepository
{
    public function validateAccessToken(string $token): bool;
    public function createAccessToken(UserEntity $user): AccessTokenResponseEntity;
}
