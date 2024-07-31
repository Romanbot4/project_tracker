<?php

namespace App\Views\Styles;

class TagColors
{
    public static string $color_1 = "#F39595";
    public static string $color_2 = "#FAEB98";
    public static string $color_3 = "#C6F9AC";
    public static string $color_4 = "#A8D9F7";
    public static string $color_5 = "#E2BBFC";

    public static function getColors(): array
    {
        return [
            static::$color_1,
            static::$color_2,
            static::$color_3,
            static::$color_4,
            static::$color_5,
        ];
    }
}
