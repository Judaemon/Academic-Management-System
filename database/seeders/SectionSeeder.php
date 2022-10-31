<?php

namespace Database\Seeders;

use App\Models\Section;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SectionSeeder extends Seeder
{
    public function run()
    {
        // 2 Sections per Grade Level

        // Grade 1 Sections
        Section::create([
            'name' => 'Red',
            'capacity' => '20',
            'teacher_id' => '5',
            'grade_level_id' => 1
        ]);
        Section::create([
            'name' => 'Orange',
            'capacity' => '20',
            'teacher_id' => '5',
            'grade_level_id' => 1
        ]);

        // Grade 2 Sections
        Section::create([
            'name' => 'Yellow',
            'capacity' => '20',
            'teacher_id' => '6',
            'grade_level_id' => 2
        ]);

        Section::create([
            'name' => 'Green',
            'capacity' => '20',
            'teacher_id' => '6',
            'grade_level_id' => 2
        ]);
    }
}
