<?php

namespace App\Domain\Entities;

use DateTime;

class UserEntity extends BaseEntity
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $displayName;
    public DateTime $updatedAt;
    public DateTime $createdAt;

    protected $attributes = [
        "id" => null,
        "firstName" => null,
        "lastName"  => null,
        "email" => null,
        "updatedAt" => null,
        "createdAt" => null,
    ];

    protected $datamap = [
        "firstName" => "first_name",
        "lastName" => "last_name",
        "createdAt" => "created_at",
        "updatedAt" => "updated_at",
    ];

    protected $casts = [
        "id" => "integer",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data["id"];
        $this->firstName = $data["first_name"];
        $this->lastName = $data["last_name"];
        $this->displayName = $this->firstName . " " . $this->lastName;
        $this->email = $data["email"];
        $this->createdAt = new DateTime($data["created_at"]);
        $this->updatedAt = new DateTime($data["updated_at"]);
    }

    public function jsonSerialize()
    {
        $return = parent::jsonSerialize();
        $return["displayName"] = $this->attributes["first_name"] . " " . $this->attributes["last_name"];
        return $return;
    }
}
