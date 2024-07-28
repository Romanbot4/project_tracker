<?php

helper("number");

use App\Domain\Entities\PageLinkEntity;
use App\Domain\Entities\PaginatedResponseEntity;

function get_paginated_links(PaginatedResponseEntity $paginatedResponse, string $url): array
{
    $offset = 3;
    $startPoint = number_clamp($paginatedResponse->page - $offset, 1, $paginatedResponse->totalLength);
    $endPoint = number_clamp($startPoint + ($offset * 2), $startPoint, $paginatedResponse->totalLength);
    $startShift = number_clamp($offset - ($paginatedResponse->totalLength - $paginatedResponse->page), 0, $offset);
    $startPointAlt = number_clamp($startPoint - $startShift, 1, $paginatedResponse->totalLength);
    $startPoint = $startPointAlt;
    $pages = number_list_generate($startPoint, $endPoint);

    $values = [];
    foreach ($pages as $page) {
        $values[] =  new PageLinkEntity($page, $url . "?page=" . $page . "&limit=" . $paginatedResponse->limit);
    }
    return $values;
}
