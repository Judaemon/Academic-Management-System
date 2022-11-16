<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    public function run()
    {
        // Accurate na yung information nato
        //  Don't touch na

        AcademicYear::create([
            'title' => 'AY 2021 - 2022',
            'is_open_for_admission' => '0',
            'status' => 'Closed',

            'start_date' => '2021-09-13',
            'school_days' => 209,
            'end_date' => '2022-06-24',
        ]);

        AcademicYear::create([
            'title' => 'AY 2022 - 2023',
            'is_open_for_admission' => '0',
            'status' => 'Ongoing',

            'start_date' => '2022-08-22',
            'school_days' => 203,
            'end_date' => '2023-11-07',
        ]);
    }
}
