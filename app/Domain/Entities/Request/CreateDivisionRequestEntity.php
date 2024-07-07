<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class CreateDivisionRequestEntity extends RequestEntity
{
    public string $title;
    public string|null $description;

    protected $attributes = [
        "title" => null,
        "description" => null,
    ];

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "permit_empty|min_length[3]|max_length[255]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->title = $data["title"];
        $this->description = array_key_exists("description", $data)  ? $data["description"] : null;
    }
}
