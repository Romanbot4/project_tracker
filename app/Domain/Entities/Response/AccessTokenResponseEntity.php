<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\BaseEntity;

class AccessTokenResponseEntity extends BaseEntity
{
    public string $accessToken;
    public string $refreshToken;

    protected $attributes = [
        "accessToken" => null,
        "refreshToken" => null,
    ];

    protected $datamap = [
        "accessToken" => "access_token",
        "refreshToken" => "refresh_token",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->accessToken = $data["access_token"];
        $this->refreshToken = $data["refresh_token"];
    }
}
