<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;
use DateTime;

class CreateProjectRequestEntity extends RequestEntity
{
    public string $title;
    public string $description;
    public DateTime $startAt;
    public DateTime $endAt;

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "permit_empty|min_length[3]|max_length[255]",
        "start_at" => "permit_empty|today_or_future_date",
        "end_at" => "required|today_or_future_date",
    ];

    public function __construct(array $data)
    {
        $data["start_at"] = array_key_exists("start_at", $data)  ? $data["start_at"] : null;

        parent::__construct($data);
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->startAt = new DateTime($data["start_at"]);
        $this->endAt = new DateTime($data["end_at"]);
    }
}
