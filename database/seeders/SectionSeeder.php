<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run()
    {
        Section::create([
            'name' => 'Red',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 1,
        ]);

        Section::create([
            'name' => 'Orange',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 2,
        ]);

        Section::create([
            'name' => 'Yellow',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 3,
        ]);

        Section::create([
            'name' => 'Green',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 4,
        ]);

        Section::create([
            'name' => 'Violet',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 5,
        ]);

        Section::create([
            'name' => 'Black',
            'capacity' => '15',
            'teacher_id' => 1,
            'grade_level_id' => 6,
        ]);
    }
}
