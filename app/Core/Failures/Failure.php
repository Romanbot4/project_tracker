<?php

namespace App\Core\Failures;

use Exception;

class Failure extends Exception
{
    public String $reason;

    public function __construct(String $reason)
    {
        parent::__construct($reason);
        $this->reason = $reason;
    }
}
