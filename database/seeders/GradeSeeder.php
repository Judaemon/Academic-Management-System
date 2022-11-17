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

        // Grades for Student ID 8 - Cayden Jackson - Section: Kinder 1 - Red
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

        // Grades for Student ID 9 - Frederick Balon - Section: Kinder 1 - Red
        Grade::create([
            'first_quarter' => '88',
            'second_quarter' => '91',
            'third_quarter' => '93',
            'fourth_quarter' => '92',

            'section_id' => '2',
            'subject_id' => '1',
            'student_id' => '9',
        ]);

        Grade::create([
            'first_quarter' => '86',
            'second_quarter' => '87',
            'third_quarter' => '85',
            'fourth_quarter' => '88',

            'section_id' => '2',
            'subject_id' => '2',
            'student_id' => '9',
        ]);

        Grade::create([
            'first_quarter' => '89',
            'second_quarter' => '90',
            'third_quarter' => '93',
            'fourth_quarter' => '91',

            'section_id' => '2',
            'subject_id' => '3',
            'student_id' => '9',
        ]);

        Grade::create([
            'first_quarter' => '82',
            'second_quarter' => '84',
            'third_quarter' => '83',
            'fourth_quarter' => '87',

            'section_id' => '2',
            'subject_id' => '4',
            'student_id' => '9',
        ]);

        // Grades for Student ID 10 - Jacqueline Reyes - Section: Kinder 1 - Red
        Grade::create([
            'first_quarter' => '89',
            'second_quarter' => '86',
            'third_quarter' => '86',
            'fourth_quarter' => '87',

            'section_id' => '2',
            'subject_id' => '1',
            'student_id' => '10',
        ]);

        Grade::create([
            'first_quarter' => '89',
            'second_quarter' => '88',
            'third_quarter' => '86',
            'fourth_quarter' => '90',

            'section_id' => '2',
            'subject_id' => '2',
            'student_id' => '10',
        ]);

        Grade::create([
            'first_quarter' => '92',
            'second_quarter' => '90',
            'third_quarter' => '92',
            'fourth_quarter' => '92',

            'section_id' => '2',
            'subject_id' => '3',
            'student_id' => '10',
        ]);

        Grade::create([
            'first_quarter' => '90',
            'second_quarter' => '89',
            'third_quarter' => '88',
            'fourth_quarter' => '89',

            'section_id' => '2',
            'subject_id' => '4',
            'student_id' => '10',
        ]);

        // Grades for Student ID 14 - Ivan Aquino - Section: Grade 1 - Green
        Grade::create([
            'first_quarter' => '83',
            'second_quarter' => '84',
            'third_quarter' => '85',
            'fourth_quarter' => '88',

            'section_id' => '4',
            'subject_id' => '5',
            'student_id' => '14',
        ]);

        Grade::create([
            'first_quarter' => '90',
            'second_quarter' => '91',
            'third_quarter' => '90',
            'fourth_quarter' => '92',

            'section_id' => '4',
            'subject_id' => '6',
            'student_id' => '14',
        ]);

        Grade::create([
            'first_quarter' => '88',
            'second_quarter' => '89',
            'third_quarter' => '87',
            'fourth_quarter' => '88',

            'section_id' => '4',
            'subject_id' => '7',
            'student_id' => '14',
        ]);

        Grade::create([
            'first_quarter' => '84',
            'second_quarter' => '82',
            'third_quarter' => '83',
            'fourth_quarter' => '84',

            'section_id' => '4',
            'subject_id' => '8',
            'student_id' => '14',
        ]);

        // Grades for Student ID 15 - Eric Labos - Section: Grade 1 - Green
        Grade::create([
            'first_quarter' => '94',
            'second_quarter' => '95',
            'third_quarter' => '94',
            'fourth_quarter' => '95',

            'section_id' => '4',
            'subject_id' => '5',
            'student_id' => '15',
        ]);

        Grade::create([
            'first_quarter' => '92',
            'second_quarter' => '93',
            'third_quarter' => '92',
            'fourth_quarter' => '93',

            'section_id' => '4',
            'subject_id' => '6',
            'student_id' => '15',
        ]);

        Grade::create([
            'first_quarter' => '95',
            'second_quarter' => '96',
            'third_quarter' => '94',
            'fourth_quarter' => '95',

            'section_id' => '4',
            'subject_id' => '7',
            'student_id' => '15',
        ]);

        Grade::create([
            'first_quarter' => '92',
            'second_quarter' => '91',
            'third_quarter' => '93',
            'fourth_quarter' => '93',

            'section_id' => '4',
            'subject_id' => '8',
            'student_id' => '15',
        ]);

        // Grades for Student ID 16 - Charles Choi - Section: Grade 1 - Green
        Grade::create([
            'first_quarter' => '82',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '83',

            'section_id' => '4',
            'subject_id' => '5',
            'student_id' => '16',
        ]);

        Grade::create([
            'first_quarter' => '85',
            'second_quarter' => '87',
            'third_quarter' => '87',
            'fourth_quarter' => '86',

            'section_id' => '4',
            'subject_id' => '6',
            'student_id' => '16',
        ]);

        Grade::create([
            'first_quarter' => '84',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '86',

            'section_id' => '4',
            'subject_id' => '7',
            'student_id' => '16',
        ]);

        Grade::create([
            'first_quarter' => '83',
            'second_quarter' => '84',
            'third_quarter' => '82',
            'fourth_quarter' => '84',

            'section_id' => '4',
            'subject_id' => '8',
            'student_id' => '16',
        ]);

        // Grades for Student ID 21 - Derek Sanchez - for old admission
        Grade::create([
            'first_quarter' => '82',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '83',

            'section_id' => '2',
            'subject_id' => '9',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '85',
            'second_quarter' => '87',
            'third_quarter' => '87',
            'fourth_quarter' => '86',

            'section_id' => '2',
            'subject_id' => '10',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '84',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '86',

            'section_id' => '2',
            'subject_id' => '11',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '83',
            'second_quarter' => '84',
            'third_quarter' => '82',
            'fourth_quarter' => '84',

            'section_id' => '2',
            'subject_id' => '12',
            'student_id' => '21',
        ]);

        // Grades for Student ID 21 - Derek Sanchez - for current admission
        Grade::create([
            'first_quarter' => '82',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '83',

            'section_id' => '4',
            'subject_id' => '5',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '85',
            'second_quarter' => '87',
            'third_quarter' => '87',
            'fourth_quarter' => '86',

            'section_id' => '4',
            'subject_id' => '6',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '84',
            'second_quarter' => '83',
            'third_quarter' => '84',
            'fourth_quarter' => '86',

            'section_id' => '4',
            'subject_id' => '7',
            'student_id' => '21',
        ]);

        Grade::create([
            'first_quarter' => '83',
            'second_quarter' => '84',
            'third_quarter' => '82',
            'fourth_quarter' => '84',

            'section_id' => '4',
            'subject_id' => '8',
            'student_id' => '21',
        ]);
    }
}
