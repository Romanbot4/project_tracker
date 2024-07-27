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
        "startAt" => null,
        "endAt" => null,
    ];

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "permit_empty|min_length[3]|max_length[255]",
        "end_at" => "required|today_or_future_date",
        "start_at" => "permit_empty|today_or_future_date"
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->title = $data["title"];
        $this->description = $data["description"];
    }
}
