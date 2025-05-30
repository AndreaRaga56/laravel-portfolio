<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProjectsTableSeeder;
use Database\Seeders\TypesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TypesTableSeeder::class, ProjectsTableSeeder::class, TechnologiesTableSeeder::class]);
    }
}
