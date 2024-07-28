<?php

namespace App\Domain\Entities;

class PageLinkEntity
{
    public int $page;
    public string $url;

    public function __construct(int $page, string $url)
    {
        $this->page = $page;
        $this->url = $url;
    }
}
