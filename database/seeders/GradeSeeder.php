<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run()
    {
        Grade::create([
            //'subject_grade_level' => '1',
            'first_quarter' => "90",
            'second_quarter' => '88',
            'third_quarter' => '92',
            'fourth_quarter' => '89',
            'student_id' => '8',
        ]);

        Grade::create([
            //'subject_grade_level' => '2',
            'first_quarter' => "90",
            'second_quarter' => '88',
            'third_quarter' => '92',
            'fourth_quarter' => '89',
            'student_id' => '10',
        ]);

        Grade::create([
            //'subject_grade_level' => '3',
            'first_quarter' => "90",
            'second_quarter' => '88',
            'third_quarter' => '92',
            'fourth_quarter' => '89',
            'student_id' => '12',
        ]);
    }
}
