<?php

namespace App\Validation;

use DateTime;

class DateValidation
{
    public function today_or_future_date($str): bool
    {
        $value = new DateTime($str);
        $diff = date_diff($value, new DateTime());
        return $diff != null && ($diff->d == 0 || $diff->invert === 1);
    }
}
