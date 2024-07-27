<?php

namespace App\Database\Seeds;

use App\Domain\Entities\Request\CreateProjectRequestEntity;
use App\Infrastructure\Models\ProjectModel;
use App\Infrastructure\Repositories\ProjectRepository;
use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $userModel = new ProjectModel();
        $userRepo = new ProjectRepository($userModel);
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $userRepo->create(new CreateProjectRequestEntity([
                "title" => $faker->name,
                "description" => $faker->paragraph,
                "end_at" => $faker->time()
            ]));
        }
    }
}
