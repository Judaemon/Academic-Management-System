<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{

    public function run()
    {
        Program::create([
            'name' => 'Kinder',
            'isEnabled' => true,
            'starting_grade_level_id' => 1,
        ]);

        Program::create([
            'name' => 'Elementary',
            'isEnabled' => true,
            'starting_grade_level_id' => 3,
        ]);

        Program::create([
            'name' => 'Junior High',
            'isEnabled' => true,
            'starting_grade_level_id' => 5,
        ]);
    }
}
