<?php

namespace Database\Seeders;

use App\Models\Project;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence();
            $newProject->type_id = rand(1,7);
            $newProject->client = $faker->company();
            $newProject->period = $faker->numberBetween(1, 24);
            $newProject->summary = $faker->paragraph();
            $newProject->save();
        }
    }
}
