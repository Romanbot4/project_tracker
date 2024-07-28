<?php

namespace App\Domain\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

helper("datetime");

class BaseEntity extends Entity
{
    public function __construct(?array $data = null)
    {
        parent::__construct($data);
    }

    protected $hiddenFields = [];

    public function jsonSerialize()
    {
        $return = parent::jsonSerialize();
        $values = [];
        $allowedFields = array_diff(array_keys($return), $this->hiddenFields);
        foreach ($allowedFields as $key) {
            $value = $return[$key];
            if ($value instanceof Time) {
                $value = dateTimeEncodeUTC($value);
            }
            $values[$key] = $value;
        }
        return $values;
    }
}
