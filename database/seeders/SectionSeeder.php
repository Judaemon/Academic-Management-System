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
            'name' => 'Red',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Orange',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Yellow',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Green',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Blue',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Indigo',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Violet',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);

        Section::create([
            'name' => 'Gray',
            'capacity' => '15',
            'teacher_id' => '3',
            'grade_level_id' => 1
        ]);
    }
}
