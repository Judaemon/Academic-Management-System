<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Admission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admission::create([
            'status' => 'Admitted',
            'academic_year_id' => '2',

            'student_id' => '7',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '1',
        ]);

        Admission::create([
            'status' => 'Pending',
            'academic_year_id' => '2',

            'student_id' => '6',
            'enrolled_by' => '1',
            'admit_to_grade_level' => '1',
            'section_id' => '2',
        ]);
    }
}
