<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class SignUpRequestEntity extends RequestEntity
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;

    protected $attributes = [
        "first_name" => null,
        "last_name" => null,
        "email" => null,
        "password" => null,
    ];

    protected array $rules = [
        "first_name" => "required|min_length[3]",
        "last_name" => "required|min_length[3]",
        "email" => "required|min_length[8]",
        "password" => "required|min_length[8]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->firstName = $data["first_name"];
        $this->lastName = $data["last_name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
    }
}
