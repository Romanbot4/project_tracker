<?php

namespace App\Controllers;

use App\Domain\Entities\UserEntity;
use CodeIgniter\Session\Session;
use Config\Services;

helper("svg_icon");

class HomeViewController extends BaseController
{
    private Session $session;
    private ?UserEntity $user;
    public function __construct()
    {
        $this->session = Services::session();
        $this->user = $this->session->get("user");
    }

    public function index(): string
    {
        return view('index', ['user' => $this->user]);
    }

    public function reports(): string
    {
        return view('reports', ['user' => $this->user]);
    }

    public function about(): string
    {
        return view('about', ['user' => $this->user]);
    }
}
