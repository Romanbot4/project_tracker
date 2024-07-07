<?php

namespace App\Domain\Entities\Response;

use App\Domain\Entities\BaseEntity;

class SuccessResponseEntity extends BaseEntity
{

    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();
        $data["success"] = true;
        return $data;
    }
}
