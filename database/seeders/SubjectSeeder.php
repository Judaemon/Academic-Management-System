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
        // 4 Subjects per Grade Level
        
        // Grade 1
        Subject::create([
            'name' => 'Mathematics 1',
            'teacher_id' => 4,
            'subject_code' => 'MATH',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Filipino 1',
            'teacher_id' => 4,
            'subject_code' => 'FIL',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Heograpiya, Kasaysayan & Sibika 1',
            'teacher_id' => 4,
            'subject_code' => 'HEKASI',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Science 1',
            'teacher_id' => 4,
            'subject_code' => 'SCI',
            'grade_level_id' => 1
        ]);

        // Grade 2
        Subject::create([
            'name' => 'Mathematics 2',
            'teacher_id' => 5,
            'subject_code' => 'MATH',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Filipino 2',
            'teacher_id' => 5,
            'subject_code' => 'FIL',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Heograpiya, Kasaysayan & Sibika 2',
            'teacher_id' => 5,
            'subject_code' => 'HEKASI',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Science 2',
            'teacher_id' => 5,
            'subject_code' => 'SCI',
            'grade_level_id' => 2
        ]);
    }
}
