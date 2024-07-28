<?php

namespace App\Domain\Entities\Response;

use CodeIgniter\Entity\Entity;

class SearchUserResponseEntity extends Entity
{
    public int $id;
    public string $displayName;
    public string $email;

    public function __construct(
        int $id,
        string $displayName,
        string $email,
    ) {
        parent::__construct([
            "id" => $id,
            "display_name" => $displayName,
            "email" => $email,
        ]);
        $this->id = $id;
        $this->displayName = $displayName;
        $this->email = $email;
    }
}
