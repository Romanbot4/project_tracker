<?php

namespace App\Domain\Services;

use App\Core\Failures\UnauthorizedFailure;

interface IJwt
{
    public function encode(array $payload): string;

    public function decode(string $token);
}

class InvalidArgumentException extends UnauthorizedFailure
{
    public function __construct()
    {
        parent::__construct("Received the invalid credential");
    }
}

class InvalidSignatureException extends UnauthorizedFailure
{
    public function __construct()
    {
        parent::__construct("Authorization signatures can't verified");
    }
}

class TokenExpiredException extends UnauthorizedFailure
{
    public function __construct()
    {
        parent::__construct("Token is expired");
    }
}
