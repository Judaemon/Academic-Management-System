<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    public function run()
    {
        AcademicYear::create([
            'title' => 'Academic Year 2021 - 2022',
            'is_open_for_admission' => '0',
            'status' => 'Ongoing',

            'start_date' => '2021-09-13',
            'school_days' => 10,
            'end_date' => '2023-06-24',
        ]);

        AcademicYear::create([
            'title' => 'Academic Year 2021 - 2022',
            'is_open_for_admission' => '0',
            'status' => 'Ongoing',

            'start_date' => '2022-08-22',
            'school_days' => 10,
            'end_date' => '2023-11-07',
        ]);
    }
}
