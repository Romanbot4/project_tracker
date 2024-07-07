<?php

function dateTimeEncodeUTC(DateTime|array|string $value): string
{
    if($value instanceof DateTime) {
        $datetime = $value;
    } else if (is_string($value)) {
        $datetime = new DateTime($value);
    } else if (is_array($value)) {
        $datetime = new DateTime($value["date"]);
    } else {
        throw new InvalidArgumentException('Invalid date value');
    }
    return $datetime->format("y-M-dTH:m:s.muZ");
}
