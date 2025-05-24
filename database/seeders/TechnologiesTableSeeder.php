<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 1; $i < 11; $i++) {
            $newTechnology = new Technology;
            $newTechnology->name = $faker->word();
            $newTechnology->color = $faker->hexColor();
            $newTechnology->save();
        }
    }
}
