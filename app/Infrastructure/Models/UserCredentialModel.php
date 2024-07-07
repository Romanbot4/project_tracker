<?php

namespace App\Infrastructure\Models;

use CodeIgniter\Model;

class UserCredentialModel extends Model
{
    protected $attributes = [
        "id" => null,
        "user_id" => null,
        "password_hash" => null,
    ];

    public function create(int $userId, string $passwordHash): string
    {
        $sql = "INSERT INTO user_credential (user_id, password_hash) VALUES (?,?);";
        $this->db->query($sql, [$userId, $passwordHash]);
        return $this->getByUserId($userId);
    }

    public function getByUserId(string $userId): string
    {
        $sql = "SELECT * FROM user_credential WHERE user_id=? LIMIT 1";
        $query = $this->db->query($sql, [$userId]);
        $result = $query->getResult();
        return ((array) $result[0])["password_hash"];
    }
}
