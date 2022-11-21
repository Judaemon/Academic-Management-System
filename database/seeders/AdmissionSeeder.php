<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Admission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionSeeder extends Seeder
{
    public function run()
    {
        // Students ID starts with 8
        // Kinder Pending       1:   26 - 27
        // Kinder               1:   8 - 10
        // Kinder               2:   11 - 13

        // Elementary           1:   14 - 16
        // Elementary           2:   17 - 19

        // Junior High          6:   20 - 22
        // Junior High          7:   23 - 25

        // kinder 1 Pending
        Admission::create([
            'status' => 'Pending',
            'academic_year_id' => '2',

            'student_id' => '26',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '2',
        ]);

        Admission::create([
            'status' => 'Pending',
            'academic_year_id' => '2',

            'student_id' => '27',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '2',
        ]);

        // kinder 1
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '8',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '9',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '10',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        // kinder 2
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '11',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '2',
            'section_id' => '3',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '12',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '2',
            'section_id' => '3',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '13',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '2',
            'section_id' => '3',
        ]);

        // elementary 1
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '14',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '3',
            'section_id' => '4',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '15',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '3',
            'section_id' => '4',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '16',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '3',
            'section_id' => '4',
        ]);

        // elementary 2
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '17',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '4',
            'section_id' => '5',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '18',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '4',
            'section_id' => '5',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '19',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '4',
            'section_id' => '5',
        ]);

        // Junior High 1
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '20',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '5',
            'section_id' => '6',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '21',
            'enrolled_by' => '2',
            'admit_to_grade_level' => '3',
            'section_id' => '4',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '22',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '5',
            'section_id' => '6',
        ]);

        // Junior High 2
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '23',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '6',
            'section_id' => '7',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '24',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '6',
            'section_id' => '7',
        ]);

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '25',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '6',
            'section_id' => '7',
        ]);
    }
}
