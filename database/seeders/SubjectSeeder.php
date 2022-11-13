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

        // Kinder subjects
        // alphabet, numbers, shapes, and colors

        // Kinder 1
        Subject::create([
            'name' => 'Alphabet',
            'teacher_id' => 1,
            'subject_code' => 'alphabet-1',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Numbers',
            'teacher_id' => 1,
            'subject_code' => 'numbers-1',
            'grade_level_id' => 1
        ]);

        Subject::create([
            'name' => 'Shapes',
            'teacher_id' => 1,
            'subject_code' => 'shapes-1',
            'grade_level_id' => 1
        ]);
        Subject::create([
            'name' => 'Colors',
            'teacher_id' => 1,
            'subject_code' => 'colors-1',
            'grade_level_id' => 1
        ]);

        // Kinder 2
        Subject::create([
            'name' => 'Alphabet',
            'teacher_id' => 1,
            'subject_code' => 'alphabet-2',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Numbers',
            'teacher_id' => 1,
            'subject_code' => 'numbers-2',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Shapes',
            'teacher_id' => 1,
            'subject_code' => 'shapes-2',
            'grade_level_id' => 2
        ]);

        Subject::create([
            'name' => 'Colors',
            'teacher_id' => 1,
            'subject_code' => 'colors-2',
            'grade_level_id' => 2
        ]);

        // Elementary Subjects
        // Mathematics, Science, English, and Social Sciences

        // Grade 1
        Subject::create([
            'name' => 'Mathematics',
            'teacher_id' => 1,
            'subject_code' => 'math-1',
            'grade_level_id' => 3
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => 1,
            'subject_code' => 'science-1',
            'grade_level_id' => 3
        ]);

        Subject::create([
            'name' => 'English',
            'teacher_id' => 1,
            'subject_code' => 'english-1',
            'grade_level_id' => 3
        ]);

        Subject::create([
            'name' => 'Social Sciences',
            'teacher_id' => 1,
            'subject_code' => 'social-sciences-1',
            'grade_level_id' => 3
        ]);

        // Grade 2
        Subject::create([
            'name' => 'Mathematics',
            'teacher_id' => 1,
            'subject_code' => 'math-2',
            'grade_level_id' => 4
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => 1,
            'subject_code' => 'science-2',
            'grade_level_id' => 4
        ]);

        Subject::create([
            'name' => 'English',
            'teacher_id' => 1,
            'subject_code' => 'english-2',
            'grade_level_id' => 4
        ]);

        Subject::create([
            'name' => 'Social Sciences',
            'teacher_id' => 1,
            'subject_code' => 'social-sciences-2',
            'grade_level_id' => 4
        ]);

        // Junior High Subjects
        // Mathematics, Science, English, and Social Sciences

        // Grade 7
        Subject::create([
            'name' => 'Mathematics',
            'teacher_id' => 1,
            'subject_code' => 'math-7',
            'grade_level_id' => 5
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => 1,
            'subject_code' => 'science-7',
            'grade_level_id' => 5
        ]);

        Subject::create([
            'name' => 'English',
            'teacher_id' => 1,
            'subject_code' => 'english-7',
            'grade_level_id' => 5
        ]);

        Subject::create([
            'name' => 'Social Sciences',
            'teacher_id' => 1,
            'subject_code' => 'social-sciences-7',
            'grade_level_id' => 5
        ]);

        // Grade 8
        Subject::create([
            'name' => 'Mathematics',
            'teacher_id' => 1,
            'subject_code' => 'math-8',
            'grade_level_id' => 6
        ]);

        Subject::create([
            'name' => 'Science',
            'teacher_id' => 1,
            'subject_code' => 'science-8',
            'grade_level_id' => 6
        ]);

        Subject::create([
            'name' => 'English',
            'teacher_id' => 1,
            'subject_code' => 'english-8',
            'grade_level_id' => 6
        ]);

        Subject::create([
            'name' => 'Social Sciences',
            'teacher_id' => 1,
            'subject_code' => 'social-sciences-8',
            'grade_level_id' => 6
        ]);
    }
}
