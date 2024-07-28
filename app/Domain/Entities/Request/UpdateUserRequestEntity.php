<?php

namespace App\Domain\Entities;

class UpdateUserRequestEntity extends RequestEntity
{
    public string $firstName;
    public string $lastName;

    protected $rules = [
        "first_name" => "required|min_length[3]|max_length[255]",
        "last_name" => "required|min_length[3]|max_length[255]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->firstName = $data["first_name"];
        $this->lastName = $data["last_name"];
    }
}
