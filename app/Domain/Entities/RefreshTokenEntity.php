<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;
use DateTime;

class RefreshTokenEntity extends Entity
{
    public string $refreshToken;
    public DateTime $expireAt;

    protected $attributes = [
        "refreshToken" => null,
        "expireAt" => null,
    ];

    protected $datamap = [
        "refreshToken" => "refresh_token",
        "expireAt" => "expire_at",
    ];

    protected $casts = [
        "expireAt" => "datetime",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->refreshToken = $data["refresh_token"];
        $this->expireAt = $data["expire_at"];
    }
}
