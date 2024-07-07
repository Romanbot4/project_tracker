<?php

namespace App\Core\Failures;

class NotFoundFailure extends Failure
{
    public function __construct(string|null $reason = null)
    {
        parent::__construct($reason ?? "Server cannot find result for your request.");
    }
}
