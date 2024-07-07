<?php

namespace App\Domain\Entities;

use CodeIgniter\Model;

/**
 * @template T
 */
class DataModel extends Model
{
    /**
     * @return T
     */
    public function create()
    {
        $sql = "INSERT INTO {$this->table} WHERE";
    }

    /**
     * @return T
     */
    public function getById(string $id)
    {
    }

    /**
     * @return T[]
     */
    public function list(int $page, int $limit)
    {
    }
}
