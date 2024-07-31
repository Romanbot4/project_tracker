<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class CreateTeamRequestEntity extends RequestEntity
{
    public string $title;
    public string $description;
    public ?string $tagColor;

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "permit_empty|min_length[3]|max_length[255]",
        "tagColor" => "permit_empty|exact_length[7]",
    ];

    public function __construct(array $data)
    {
        $data["tag_color"] = array_key_exists("tag_color", $data)  ? $data["tag_color"] : null;

        parent::__construct($data);
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->tagColor = $data["tag_color"];
    }
}
