<?php

namespace App\Database\Seeds;

use App\Domain\Entities\Request\SignUpRequestEntity;
use App\Infrastructure\Models\UserModel;
use App\Infrastructure\Repositories\UserRepository;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userRepo = new UserRepository($userModel);
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $password = "meiktila001";//$faker->password(10);
            $userRepo->create(new SignUpRequestEntity([
                "first_name" => $faker->firstName(),
                "last_name" => $faker->lastName(),
                "email" => $faker->email(),
                "password" => $password,
                "confirm_password" => $password,
            ]));
        }
    }
}
