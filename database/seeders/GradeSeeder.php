<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run()
    {
        Grade::create([
            'first_quarter' => "90",
            'second_quarter' => '88',
            'third_quarter' => '92',
            'fourth_quarter' => '89',

            'section_id' => '1',
            'subject_id' => '1',
            'student_id' => '8',
        ]);

        Grade::create([
            'first_quarter' => "87",
            'second_quarter' => '92',
            'third_quarter' => '86',
            'fourth_quarter' => '91',

            'section_id' => '2',
            'subject_id' => '2',
            'student_id' => '10',
        ]);

        Grade::create([
            'first_quarter' => "79",
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '83',

            'section_id' => '3',
            'subject_id' => '3',
            'student_id' => '12',
        ]);
    }
}
