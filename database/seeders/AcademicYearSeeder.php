<?php

namespace Database\Seeders;

use App\Models\AcademicYear;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_1 = Carbon::create('2022', '01', '01');
        $days_1 = '42';

        $start_2 = Carbon::create('2022', '08', '01');
        $days_2 = '126';

        AcademicYear::create([
            'start_date' => $start_1->format('Y-m-d H:i:s'),
            'school_days' => $days_1,
            'end_date' => $start_1->addDays($days_1),
        ]);

        AcademicYear::create([
            'start_date' => $start_2->format('Y-m-d H:i:s'),
            'school_days' => $days_2,
            'end_date' => $start_2->addDays($days_2),
        ]);
    }
}
