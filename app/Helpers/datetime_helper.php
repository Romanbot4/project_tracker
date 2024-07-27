<?php

function dateTimeEncodeUTC(DateTime|array|string $value): string
{
    $datetime = dateTimeParse($value);
    return $datetime->format("y-M-dTH:m:s.muZ");
}

function dateTimePublic(DateTime|array|string $value): string
{
    $datetime = dateTimeParse($value);
    return $datetime->format("M d, y");
}


function dateTimeParse(DateTime|array|string $value): DateTime
{
    if ($value instanceof DateTime) {
        return  $value;
    } else if (is_string($value)) {
        return  new DateTime($value);
    } else if (is_array($value)) {
        return  new DateTime($value["date"]);
    } else {
        throw new InvalidArgumentException('Invalid date value');
    }
}