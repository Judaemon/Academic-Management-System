<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeLevel;


class GradeLevelSeeder extends Seeder
{
    public function run()
    {
        GradeLevel::create([
            'name' => "Kinder 1",
            'program_id' => '1',
        ]);

        GradeLevel::create([
            'name' => "Kinder 2",
            'program_id' => '1',
        ]);

        GradeLevel::create([
            'name' => "Grade 1",
            'program_id' => '2',
        ]);

        GradeLevel::create([
            'name' => "Grade 2",
            'program_id' => '2',
        ]);

        GradeLevel::create([
            'name' => "Grade 7",
            'program_id' => '3',
        ]);

        GradeLevel::create([
            'name' => "Grade 8",
            'program_id' => '3',
        ]);
    }
}
