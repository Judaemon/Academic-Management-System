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
        $enrolled_date1 = Carbon::create('2022', '07', '30');
        $enrolled_date2 = Carbon::create('2022', '08', '10');

        Admission::create([
            'status' => 'Admitted',
            'enrolled_by' => 'Principal Bat-Eg',
            'date_enrolled' => $enrolled_date1->format('Y-m-d H:i:s'),
            'section_id' => '1',
            'student_id' => '7',
        ]);

        Admission::create([
            'status' => 'Pending',
            'enrolled_by' => 'Principal Bat-Eg',
            'date_enrolled' => $enrolled_date2->format('Y-m-d H:i:s'),
            'section_id' => '2',
            'student_id' => '6',
        ]);
    }
}
