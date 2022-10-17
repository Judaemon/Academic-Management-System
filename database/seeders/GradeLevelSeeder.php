<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GradeLevel;


class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeLevel::create([
            'name' => "Grade 1"
        ]);

        GradeLevel::create([
            'name' => "Grade 6"
        ]);
    }
}
