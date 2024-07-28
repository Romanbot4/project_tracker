<?php

function number_clamp(int|float $value, int|float $start, int|float $end)
{
    if ($value < $start) return $start;
    if ($value > $end) return $end;

    return $value;
}

function number_list_generate(int $start, int $end) : array
{
    $values = [];
    for ($i = $start; $i < $end + 1; $i++) {
        $values[] = $i;
    }
    return $values;
}
