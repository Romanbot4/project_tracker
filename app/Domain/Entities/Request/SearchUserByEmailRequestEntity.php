<?php

namespace App\Domain\Entities\Request;


use App\Domain\Entities\RequestEntity;

class SearchUserByEmailRequestEntity extends RequestEntity
{
    public string $email;

    protected $attributes = [
        "email" => null,
    ];

    protected $rules = [
        "email" => "required|min_length[8]|max_length[255]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->email = $data["email"];
    }
}
