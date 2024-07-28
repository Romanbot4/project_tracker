<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\BaseEntity;

class AccessTokenResponseEntity extends BaseEntity
{
    public string $accessToken;
    public string $refreshToken;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->accessToken = $data["access_token"];
        $this->refreshToken = $data["refresh_token"];
    }
}
