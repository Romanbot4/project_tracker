<?php

namespace App\Infrastructure\Models;

use App\Core\Failures\BadRequestFailure;
use App\Core\Failures\NotFoundFailure;
use App\Domain\Entities\Request\PaginationRequestEntity;
use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Domain\Entities\Response\SuccessResponseEntity;
use App\Domain\Entities\UpdateUserRequestEntity;
use App\Domain\Entities\UserEntity;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $validationRules = [
        "first_name" => "required|min_length[3]|max_length[255]",
        "last_name" => "required|min_length[3]|max_length[255]",
        "email" => "required|min_length[8]|max_length[255]|is_unique[users.email]",
        "password" => "required|min_length[8]|max_length[255]",
    ];

    protected $validationMessages = [
        "email" => [
            "is_unique" => "User with the same email already exists."
        ]
    ];

    public function create(SignUpRequestEntity $data): UserEntity
    {
        if ($this->validate((array) $data)) {
            $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?);";
            $result = $this->db->query($sql, [$data->firstName, $data->lastName, $data->email]);
            $lastId = $this->db->insertID();
            if ($result) return $this->getById($lastId);
        }

        throw new BadRequestFailure(
            $this->validation->getErrors(),
        );
    }

    public function getById(string $id): UserEntity
    {
        $sql = "SELECT * FROM users WHERE id=? LIMIT 1";
        $query = $this->db->query($sql, [$id]);
        $result = $query->getResult();

        if (count($result) > 0) {
            return new UserEntity((array) $result[0]);
        }
        throw new NotFoundFailure();
    }

    public function getByEmail(string $email): UserEntity
    {
        $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
        $query = $this->db->query($sql, [$email]);
        $result = $query->getResult();

        if (count($result) > 0) {
            return new UserEntity((array) $result[0]);
        }
        throw new NotFoundFailure();
    }


    public function list(array $data): array
    {
        $pagination = new PaginationRequestEntity($data);
        $sql = "SELECT * FROM users LIMIT ? OFFSET ?;";
        $query = $this->db->query($sql, [$pagination->limit, $pagination->offset]);
        $result = $query->getResult();
        $value = [];
        foreach ($result as $row) {
            $value[] = new UserEntity((array) $row);
        }
        return $value;
    }

    public function edit(int $id, UpdateUserRequestEntity $form): UserEntity
    {
        $sql = "UPDATE users SET first_name=?, last_name=?, password=? WHERE id=? ";
        $result = $this->db->query($sql, [$form->name, $form->password, $id]);
        if ($result === true) return $this->getById($this->db->insertID());
        throw new BadRequestFailure($this->validation->getErrors());
    }

    public function remove(int $id): SuccessResponseEntity
    {
        $sql = "DELETE FROM users WHERE id=?;";
        $result = $this->db->query($sql, [$id]);
        return new SuccessResponseEntity("Successfully deleted the user");
    }
}
