<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GradessExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Grade::query()->with('user');
    }

    public function headings(): array
    {
        return [
            'Student',
            'First Quarter',
            'Second Quarter',
            'Third Quarter',
            'Fourth Quarter',
            //'Average Grade',
        ];
    }

    public function map($grade): array
    {
        return [
            $grade->user->last_name,
            $grade->first_quarter,
            $grade->second_quarter,
            $grade->third_quarter,
            $grade->fourth_quarter,
            //$grade->average_grade,
        ];
    }

    public function fields(): array
    {
        return [
            'subject_id',
            'first_quarter',
            'second_quarter',
            'third_quarter',
            'fourth_quarter',
            //'average_grade',
        ];
    }
}