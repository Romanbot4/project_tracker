<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class CreateDivisionRequestEntity extends RequestEntity
{
    public string $title;
    public ?string $description;

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "permit_empty|min_length[3]|max_length[255]",
    ];

    public function __construct(array $data)
    {
        $data["description"] = array_key_exists("description", $data)  ? $data["description"] : null;
        
        parent::__construct($data);
        $this->title = $data["title"];
        $this->description = $data["description"];
    }
}
