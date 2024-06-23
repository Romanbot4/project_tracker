<?php

namespace App\Domain\Repositories;

/**
 * @template T
 */
interface ModelRepository
{
    /**
     * @return T
     */
    public function create(array $data);
    
    /**
     * @return T[]
     */
    public function list(int $page, int $limit);

    
    /**
     * @return T
     */
    public function getById(int $id);

    
    /**
     * @return T
     */
    public function update(int $id, array $data);

    
    /**
     * @return bool
     */
    public function delete(int $id);
}
