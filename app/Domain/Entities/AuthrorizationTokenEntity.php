<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class AuthorizationEntity extends Entity
{
    protected $attributes = [
        "accessToken" => null,
        "refreshToken" => null,
    ];

    protected $datamap = [
        "accessToken" => "access_token",
        "refreshToken" => "refresh_token",
    ];
}
