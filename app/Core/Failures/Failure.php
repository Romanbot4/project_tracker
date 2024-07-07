<?php

namespace App\Core\Failures;

use Exception;

class Failure extends Exception
{
    public string $reason;

    public function __construct(string $reason)
    {
        parent::__construct($reason);
        $this->reason = $reason;
    }
}
