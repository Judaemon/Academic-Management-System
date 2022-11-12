<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubjectSchedule;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $day1 = Carbon::create('2022', '08', '24');

        $day2 = Carbon::create('2022', '08', '25');

        SubjectSchedule::create([
            'time' => "8:00",
            'day' => $day1->format('Y-m-d H:i:s'),

            'student_id' => "10",
            'subject_id' => "1",
            'teacher_id' => "6",
        ]);

        SubjectSchedule::create([
            'time' => "9:00",
            'day' => $day1->format('Y-m-d H:i:s'),

            'student_id' => "10",
            'subject_id' => "2",
            'teacher_id' => "5",
        ]);

        SubjectSchedule::create([
            'time' => "8:00",
            'day' => $day2->format('Y-m-d H:i:s'),

            'student_id' => "10",
            'subject_id' => "1",
            'teacher_id' => "7",
        ]);
    }
}
