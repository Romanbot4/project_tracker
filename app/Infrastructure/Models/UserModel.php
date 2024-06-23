<?php

namespace App\Infrastructure\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $validationRules = [
        "name" => "required|min_length[3]|max_length[255]",
        "credential" => "required|min_length[8]|max_length[255]",
    ];
}
