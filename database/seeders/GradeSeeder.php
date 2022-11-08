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
            'first_quarter' => "87",
            'second_quarter' => '92',
            'third_quarter' => '86',
            'fourth_quarter' => '91',
            'student_id' => '10',
        ]);

        Grade::create([
            //'subject_grade_level' => '3',
            'first_quarter' => "79",
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '83',
            'student_id' => '12',
        ]);
    }
}
