<?php

namespace App\Controllers;

use App\Infrastructure\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
