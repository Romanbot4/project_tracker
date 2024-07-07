<?php

namespace App\Infrastructure\Mappers;

use App\Domain\Entities\Response\SearchUserResponseEntity;
use App\Domain\Entities\UserEntity;

abstract class SearchUserResponseMapper
{
    public static function fromUser(UserEntity $user)
    {
        return new SearchUserResponseEntity(
            $user->id,
            $user->displayName,
            $user->email,
        );
    }
}
