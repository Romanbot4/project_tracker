<?php

namespace App\Domain\Repositories;

interface ISearchRepository {
    public function searchUserByEmail(string $email);
}