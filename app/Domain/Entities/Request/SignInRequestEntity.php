<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class SignInRequestEntity extends RequestEntity
{
    public string $email;
    public string $password;

    protected $attributes = [
        "email" => null,
        "password" => null,
    ];

    protected $rules = [
        "email" => "required|min_length[8]|max_length[255]",
        "password" => "required|max_length[255]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->email = $data["email"];
        $this->password = $data["password"];
    }
}
