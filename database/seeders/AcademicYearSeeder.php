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
        AcademicYear::create([
            'start_year' => Carbon::create('2021', '08', '01')->format('Y-m-d H:i:s'),
            'end_year' => Carbon::create('2022', '04', '28')->format('Y-m-d H:i:s'),
        ]);

        AcademicYear::create([
            'start_year' => Carbon::create('2022', '08', '01')->format('Y-m-d H:i:s'),
            'end_year' => Carbon::create('2023', '04', '28')->format('Y-m-d H:i:s'),
        ]);
    }
}
