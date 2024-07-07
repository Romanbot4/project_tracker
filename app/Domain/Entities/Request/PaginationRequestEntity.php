<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class PaginationRequestEntity extends RequestEntity
{
    public int $page;
    public int $limit;

    protected $attributes = [
        "page" => null,
        "limit" => null,
    ];

    protected $rules = [
        "page" => "greater_than_equal_to[1]",
        "limit" => "greater_than_equal_to[1]|less_than_equal_to[20]"
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        //default to 1 if not given
        $data["page"] = $data["page"] ?? 1;

        //default to 20 if not given
        $data["limit"] = $data["limit"] ?? 20;

        $this->validate($data);
        $this->page = $data["page"];
        $this->limit = $data["limit"];
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->limit;
    }
}
