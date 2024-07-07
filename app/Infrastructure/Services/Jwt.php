<?php

namespace App\Infrastructure\Services;

use App\Domain\Services\IJwt;
use App\Domain\Services\InvalidSignatureException;
use App\Domain\Services\TokenExpiredException;
use InvalidArgumentException;

class Jwt implements IJwt
{
    protected string $key;

    public function __construct(string $key = null)
    {
        $this->key = $key;
    }

    public function encode(array $payload): string
    {
        $header = $this->base64URLEncode(json_encode([
            "alg" => "HS256",
            "typ" => "JWT"
        ]));

        $payload = $this->base64URLEncode(json_encode($payload));

        $signature = $this->base64URLEncode(hash_hmac(
            "sha256",
            $header . "." . $payload,
            $this->key,
            true
        ));

        return $header . "." . $payload . "." . $signature;
    }

    private function base64URLEncode(string $text): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
    }

    public function decode(string $token): array
    {
        // Remove "Bearer " prefix using regex
        $token = preg_replace('/^Bearer\s/', '', $token);

        if (preg_match(
            "/^(?<header>.+)\.(?<payload>.+)\.(?<signature>.+)$/",
            $token,
            $matches
        ) !== 1) {
            throw new InvalidArgumentException();
        }

        $signature = hash_hmac(
            "sha256",
            $matches["header"] . "." . $matches["payload"],
            $this->key,
            true
        );

        $signature_from_token = $this->base64URLDecode($matches["signature"]);

        if (!hash_equals($signature, $signature_from_token)) {
            throw new InvalidSignatureException;
        }

        $payload = json_decode($this->base64URLDecode($matches["payload"]), true);


        if ($payload["exp"] < time()) {
            throw new TokenExpiredException;
        }

        return $payload;
    }

    private function base64URLDecode(string $text): string
    {
        return base64_decode(
            str_replace(
                ['-', '_',],
                ['+', '/',],
                $text
            )
        );
    }
}
