<?php

function svg_icon(string $path, string $color = null): void
{
    $content = file_get_contents($path);
    if ($color != null) {
        $content = preg_replace('/(?<=")#\S+(?=")/', $color, $content);
    }
    echo $content;
}
