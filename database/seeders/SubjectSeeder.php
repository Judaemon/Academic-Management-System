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
            'name' => 'Thesis 1',
            'teacher_id' => '1',
            'subject_code' => 'THESCS1',
        ]);

        Subject::create([
            'name' => 'Thesis 2',
            'teacher_id' => '1',
            'subject_code' => 'THESCS2',
        ]);

        Subject::create([
            'name' => 'Social Practices',
            'teacher_id' => '1',
            'subject_code' => 'SOPRAC1',
        ]);

        Subject::create([
            'name' => 'Emerging Technologies',
            'teacher_id' => '1',
            'subject_code' => 'EMTECH1',
        ]);
    }
}
