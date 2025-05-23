<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words=['PHP Vanilla', 'Laravel', 'Express', 'Node.js', 'HTML Vanilla', 'Javascript Vanilla', 'React.js'];

        foreach($words as $word) {
            $newType = new Type();
            $newType->name = $word;
            $newType->save();
        }
    }
}
