<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ISearchRepository;
use App\Domain\Repositories\IUserRepository;
use App\Infrastructure\Mappers\SearchUserResponseMapper;

class SearchRepository implements ISearchRepository
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function searchUserByEmail(string $email)
    {
        $user = $this->userRepository->getByEmail($email);
        return SearchUserResponseMapper::fromUser($user);
    }
}
