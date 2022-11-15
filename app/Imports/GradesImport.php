<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class GradesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    private $users;

    public function __construct()
    {
        $this->users = User::all(['id', 'last_name'])->pluck('id', 'last_name');
    }

    public function model(array $row)
    {
        return new Grade([
            'student_id' => $this->users[$row['student']],
            'subject_id' => $this->subjects[$row['subject']],
            'first_quarter' => $row['first_quarter'],
            'second_quarter' => $row['second_quarter'],
            'third_quarter' => $row['third_quarter'],
            'fourth_quarter' => $row['fourth_quarter']
        ]);
    }
}