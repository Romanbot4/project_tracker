<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\RefreshTokenEntity;
use CodeIgniter\Model;
use DateTime;

helper("datetime");

class RefreshTokenModel extends Model
{
    protected $attributes = [
        "id" => null,
        "ip_address" => null,
        "user_agent" => null,
        "refresh_token" => null,
        "expire_at" => null,
        "created_at" => null,
        "updated_at" => null,
    ];

    protected $casts = [
        "id" => "integer",
        "refreshToken" => "refresh_token",
        "expireAt" => "datetime",
        "createdaAt" => "datetime",
        "updatedAt" => "datetime",
    ];

    protected $datamap = [
        "ipAddress" => "ip_address",
        "userAgent" => "user_agent",
        "expireAt" => "expire_at",
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    public function getByToken(string $id): RefreshTokenEntity
    {
        $sql = "SELECT * FROM refresh_token WHERE refresh_id=? LIMIT 1";
        $result = $this->db->query($sql);
        if (count($result->getResult()) > 0) {
            return new RefreshTokenEntity((array) $result[0]);
        } else {
            throw new NotFoundFailure();
        }
    }


    public function create(string $refreshToken, DateTime $expireAt)
    {
        $sql = "INSERT INTO refresh_token (refresh_token, expire_at) VALUES (?,?);";
        $result = $this->db->query($sql, [
            $refreshToken,
            dateTimeEncodeUTC($expireAt),
        ]);
        return $this->getByToken($refreshToken);
    }
}
