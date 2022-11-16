<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admission;

class PastAcademicYearAdmissionSeeder extends Seeder
{
    // parang past record to
    public function run()
    {
        // matututlog muna ako di pa ako natutulog

        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '1',

            'student_id' => '13',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '2',
        ]);
    }
}
