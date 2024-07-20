<?php

namespace App\Controllers;

class HomeViewController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
}
