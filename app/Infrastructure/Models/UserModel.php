<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\UserEntity;
use App\Domain\Request\SignUpRequestEntity;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $validationRules = [
        "name" => "required|min_length[3]|max_length[255]",
        "credential" => "required|min_length[8]|max_length[255]",
        "password" => "required|min_length[8]|max_length[255]",
    ];

    public function create(SignUpRequestEntity $form): UserEntity
    {
        $this->validate((array) $form);
        $sql = "INSERT INTO users (name, credential, password) VALUES (?, ?, ?)";
        $result = $this->db->query($sql, [$form->name, $form->credential, $form->password]);
        if ($result) return $this->getById($this->db->insertID());

        throw new BadRequestFailure(
            $this->validation->getErrors(),
        );
    }


    public function getById(String $id): UserEntity
    {
        $sql = "SELECT HEX(id) AS id,name,credential,password,updated_at,created_at FROM users WHERE HEX(id)=? LIMIT 1";
        $query = $this->db->query($sql, [$id]);
        $result = $query->getResult();
        if (count($result) > 0) return new UserEntity((array) $result[0]);
        throw new NotFoundFailure();
    }
}
