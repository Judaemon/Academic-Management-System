<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class StudentGradesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    use Exportable;

    public $grade;

    public function __construct($grade) {
        $this->grade = $grade;
    }

    public function headings():array{
        return[
            'Subject',
            'First Quarter',
            'Second Quarter',
            'Third Quarter',
            'Fourth Quarter',
        ];
    } 

    public function columnWidths(): array
    {
        return [
            'A' => 10, 
            'B' => 18,
            'C' => 18,   
            'D' => 18, 
            'E' => 18,     
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:E1' => [ 'font' => ['bold' => true ]],
            'A1:E1' => [ 'font' => ['size' => 14 ]],
        ];
    }

    public function collection()
    {
        return Grade::select('subject_id', 'first_quarter', 'second_quarter', 'third_quarter', 'fourth_quarter')
                         ->whereIn('id', $this->grade)
                         ->get();
    }
}
