<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;

helper("datetime");

class BaseEntity extends Entity
{
    public function __construct(?array $data = null)
    {
        parent::__construct($data);
    }

    public function jsonSerialize()
    {
        $return = parent::jsonSerialize();
        if (array_key_exists("created_at", $this->attributes)) {
            $return["createdAt"] = dateTimeEncodeUTC($this->attributes["created_at"]);
        }

        if (array_key_exists("updated_at", $this->attributes)) {
            $return["updatedAt"] = dateTimeEncodeUTC($this->attributes["updated_at"]);
        }
        return $return;
    }
}
