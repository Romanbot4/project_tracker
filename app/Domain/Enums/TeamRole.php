<?php

namespace App\Domain\Enums;

use InvalidArgumentException;

enum TeamRole
{
    case LEADER;
    case CO_LEADER;
    case VIEWER;


    public static function parse(string $value): TeamRole
    {
        foreach (TeamRole::cases() as $key) {
            if ($key->name === $value) return $key;
        }
        throw new InvalidArgumentException();
    }
}
