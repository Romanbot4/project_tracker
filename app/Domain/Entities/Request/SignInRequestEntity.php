<?php

namespace App\Domain\Entities\Request;

use CodeIgniter\Entity\Entity;

class SignInRequestEntity extends Entity
{
    public string $credential;
    public string $password;

    public function __construct(String $credential, string $password)
    {
        $this->credential =  $credential;
        $this->password = $password;
    }
}
