<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

class PaginatedResponseEntity extends Entity
{
    public array $data;
    public int $page;
    public int $limit;
    public int $totalLength;
    public ?int $prevPage;
    public ?int $nextPage;

    public function __construct(array $data, int $limit, int $page, int $count)
    {
        $this->data = $data;
        $this->limit = $limit;
        $this->totalLength = ceil($count / $limit);
        $this->page = $page;

        $hasMore = (($page - 1) * $limit) + count($data) < $count;
        $this->nextPage =  $hasMore ? $page + 1 : null;
        $this->prevPage = $page > 1 ? $page - 1 : null;

        parent::__construct([
            "data" => $data,
            "page" => $page,
            "limit" => $limit,
            "prev_page" => $this->prevPage,
            "next_page" => $this->nextPage,
            "total_pages" => $this->totalLength,
        ]);
    }
}
