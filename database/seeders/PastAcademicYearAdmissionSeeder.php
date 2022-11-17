<?php

namespace Database\Seeders;

use App\Models\Admission;
use Illuminate\Database\Seeder;

class PastAcademicYearAdmissionSeeder extends Seeder
{
    // parang past record to
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
            'status' => 'Passed',
            'academic_year_id' => '1',

            'student_id' => '11',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Passed',
            'academic_year_id' => '1',

            'student_id' => '12',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Passed',
            'academic_year_id' => '1',

            'student_id' => '13',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Passed',
            'academic_year_id' => '1',

            'student_id' => '13',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Passed',
            'academic_year_id' => '1',

            'student_id' => '21',
            'enrolled_by' => '2',
            'admit_to_grade_level' => '1',
            'section_id' => '2',
        ]);
    }
}
