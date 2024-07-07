<?php

namespace App\Domain\Entities\Request;

use App\Domain\Entities\RequestEntity;

class CreateFeatureRequestEntity extends RequestEntity
{
    public string $title;
    public int $projectId;

    protected $attributes = [
        "title" => null,
        "project_id" => null,
    ];

    protected $rules = [
        "title" => "required|min_length[3]|max_length[255]",
        "project_id" => "required",
    ];

    protected $datamap = [
        "projectId" => "project_id",
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validate($data);
        $this->title = $data["title"];
        $this->projectId = $data["project_id"];
    }
}
