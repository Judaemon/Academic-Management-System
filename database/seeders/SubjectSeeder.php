<?php

namespace Database\Seeders;

use App\Models\Subject;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        Subject::create([
            'name' => 'Mathematics',
            'teacher_id' => '1',
            'subject_code' => 'MATH',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Filipino',
            'teacher_id' => '1',
            'subject_code' => 'FIL',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Heograpiya, Kasaysayan & Sibika',
            'teacher_id' => '1',
            'subject_code' => 'HEKASI',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => '1',
            'subject_code' => 'SCI',
            'grade_level_id' => 1
        ]);
    }
}
