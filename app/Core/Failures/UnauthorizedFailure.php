<?php

namespace App\Core\Failures;


class UnauthorizedFailure extends Failure
{
    public function __construct(?string $reason = null)
    {
        parent::__construct($reason ?? "User not authorized");
    }
}
