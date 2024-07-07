<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\BaseEntity;

class SuccessResponseEntity extends BaseEntity
{
    public string $message;
    public function __construct(string $message = null)
    {
        $this->message = $message ?? "Success";
        parent::__construct([
            "success" => true,
            "message" => $this->message
        ]);
    }
}
