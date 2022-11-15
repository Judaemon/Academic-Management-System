<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run()
    {
        // 1 section per grade level
        // except kinder 1 which has 2 section (for demo)

        Section::create([
            'name' => 'Red',
            'capacity' => '20',
            'teacher_id' => '5',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Orange',
            'capacity' => '20',
            'teacher_id' => '6',
            'grade_level_id' => 1,
        ]);

        Section::create([
            'name' => 'Yellow',
            'capacity' => '15',
            'teacher_id' => '7',
            'grade_level_id' => 2,
        ]);

        Section::create([
            'name' => 'Green',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 3,
        ]);

        Section::create([
            'name' => 'blue',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 4,
        ]);

        Section::create([
            'name' => 'indigo',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 5,
        ]);

        Section::create([
            'name' => 'violet',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 6,
        ]);
    }
}
