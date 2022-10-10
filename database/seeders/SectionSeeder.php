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
        Section::create([
            'name' => 'Grade 1 - Red',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '1',
        ]);

        Section::create([
            'name' => 'Grade 1 - Orange',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '1',
        ]);

        Section::create([
            'name' => 'Grade 2 - Yellow',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '2',
        ]);

        Section::create([
            'name' => 'Grade 2 - Green',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '2',
        ]);

        Section::create([
            'name' => 'Grade 3 - Blue',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '3',
        ]);

        Section::create([
            'name' => 'Grade 3 - Indigo',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '3',
        ]);

        Section::create([
            'name' => 'Grade 4 - Violet',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '4',
        ]);

        Section::create([
            'name' => 'Grade 4 - Gray',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => '4',
        ]);
    }
}
