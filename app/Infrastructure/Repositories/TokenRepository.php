<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Response\AccessTokenResponseEntity;
use App\Domain\Services\IJwt;
use App\Domain\Entities\UserEntity;
use App\Domain\Repositories\ITokenRepository;
use DateInterval;
use DateTime;

class TokenRepository implements ITokenRepository
{
    protected IJwt $jwt;
    public function __construct(IJwt $jwt = null)
    {
        $this->jwt = $jwt ?? \Config\Services::jwt();
    }

    public function validateAccessToken(string $token): bool
    {
        $this->jwt->decode($token);
        return true;
    }

    public function createAccessToken(UserEntity $user): AccessTokenResponseEntity
    {
        $current = new DateTime();
        $exp = $current->add(DateInterval::createFromDateString("1 hour"));
        $accessToken = $this->jwt->encode([
            "sub" => $user->id,
            "name" => $user->displayName,
            "iat" => time(),
            "exp" => time() + 20,//(24 * 60 * 60 * 1000),
        ]);
        $refreshToken = $this->jwt->encode([
            "token" => $accessToken,
        ]);
        return new AccessTokenResponseEntity([
            "access_token" => $accessToken,
            "refresh_token" => $refreshToken,
        ]);
    }
}
