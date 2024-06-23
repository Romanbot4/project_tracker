<?php

namespace App\Domain\Request;

use CodeIgniter\Entity\Entity;

class SignUpRequestEntity extends Entity
{
    public string $firstName;
    public string $secondName;
    public string $credential;
    public string $password;

    public function __construct(
        string $firstName,
        string $secondName,
        string $credential,
        string $password,
    ) {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->credential = $credential;
        $this->password = $password;
    }
}
