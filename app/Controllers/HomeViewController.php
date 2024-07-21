<?php

namespace App\Controllers;
use Config\Services;

class HomeViewController extends BaseController
{
    public function index(): string
    {
        $session = Services::session();
        return view('index', ['user' => $session->get('user')]);
    }
}
