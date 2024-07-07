<?php

namespace App\Core\Failures;

class BadRequestFailure extends Failure
{
    public array $errors;

    public function __construct(array $errors = [], string|null $reason = null)
    {
        parent::__construct($reason ?? "Server cannot process your request.");
        $this->errors = $errors;
    }
}
