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
        ]);

        Subject::create([
            'name' => 'Filipino',
            'teacher_id' => '1',
            'subject_code' => 'FIL',
        ]);

        Subject::create([
            'name' => 'Heograpiya, Kasaysayan & Sibika',
            'teacher_id' => '1',
            'subject_code' => 'HEKASI',
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => '1',
            'subject_code' => 'SCI',
        ]);
    }
}
