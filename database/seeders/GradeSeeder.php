<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run()
    {
        // Grades for Student ID 19 - Kyla Lao
        Grade::create([
            'first_quarter' => '91',
            'second_quarter' => '90',
            'third_quarter' => '98',
            'fourth_quarter' => '95',

            'section_id' => '5',
            'subject_id' => '13',
            'student_id' => '19',
        ]);

        Grade::create([
            'first_quarter' => '92',
            'second_quarter' => '93',
            'third_quarter' => '91',
            'fourth_quarter' => '92',

            'section_id' => '5',
            'subject_id' => '14',
            'student_id' => '19',
        ]);

        Grade::create([
            'first_quarter' => '98',
            'second_quarter' => '95',
            'third_quarter' => '97',
            'fourth_quarter' => '96',

            'section_id' => '5',
            'subject_id' => '15',
            'student_id' => '19',
        ]);

        Grade::create([
            'first_quarter' => '98',
            'second_quarter' => '95',
            'third_quarter' => '97',
            'fourth_quarter' => '96',

            'section_id' => '5',
            'subject_id' => '16',
            'student_id' => '19',
        ]);

        // Grades for Student ID 8 - Cayden Jackson
        Grade::create([
            'first_quarter' => '94',
            'second_quarter' => '93',
            'third_quarter' => '95',
            'fourth_quarter' => '91',

            'section_id' => '2',
            'subject_id' => '1',
            'student_id' => '8',
        ]);

        Grade::create([
            'first_quarter' => '97',
            'second_quarter' => '98',
            'third_quarter' => '96',
            'fourth_quarter' => '98',

            'section_id' => '2',
            'subject_id' => '2',
            'student_id' => '8',
        ]);

        Grade::create([
            'first_quarter' => '94',
            'second_quarter' => '93',
            'third_quarter' => '95',
            'fourth_quarter' => '92',

            'section_id' => '2',
            'subject_id' => '3',
            'student_id' => '8',
        ]);

        Grade::create([
            'first_quarter' => '91',
            'second_quarter' => '92',
            'third_quarter' => '93',
            'fourth_quarter' => '95',

            'section_id' => '2',
            'subject_id' => '4',
            'student_id' => '8',
        ]);
    }
}
