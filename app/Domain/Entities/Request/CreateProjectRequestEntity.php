<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class CreateProjectRequestEntity extends RequestEntity
{
    public string $title;
    public string $description;

    protected $attributes = [
        "title" => null,
        "description" => null,
    ];

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "min_length[3]|max_length[255]",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->title = $data["title"];
        $this->description = $data["description"];
    }
}
