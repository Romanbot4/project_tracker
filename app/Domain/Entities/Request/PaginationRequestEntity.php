<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class PaginationRequestEntity extends RequestEntity
{
    public int $page;
    public int $limit;
    public int $offset;

    protected $rules = [
        "page" => "greater_than_equal_to[1]",
        "limit" => "greater_than_equal_to[1]|less_than_equal_to[20]"
    ];

    public function __construct(array $data)
    {
        $data["page"] = $data["page"] ?? 1;
        //default to 1 if not given
        
        //default to 20 if not given
        $data["limit"] = $data["limit"] ?? 20;

        parent::__construct($data);
        $this->page = $data["page"];
        $this->limit = $data["limit"];
        $this->offset = ($this->page - 1) * $this->limit;
    }
}
