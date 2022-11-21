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
use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class StudentGradesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths, WithDrawings
{
    use Exportable;

    public $grades;

    public function drawings(){
        $drawing = new Drawing();
        $drawing->setName('ISCP');
        $drawing->setDescription('CAIMS');
        $drawing->setPath(public_path('images\system\iscp_logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');

        return $drawing;
    }

    public function __construct($grades){
        $this->grades = $grades;
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

    public function columnWidths():array{
        return [
            'A' => 12, 
            'B' => 18,
            'C' => 18,   
            'D' => 18, 
            'E' => 18,     
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            'A1:E1' => [ 'font' => ['bold' => true ]],
            'A1:E1' => [ 'font' => ['size' => 16 ]],
            'A1:E1' => [ 'font' => ['family' => 'Times New Roman' ]],
        ];
    }

    public function collection(){
        return Grade::select('subject_id', 'first_quarter', 'second_quarter', 'third_quarter', 'fourth_quarter')
                         ->whereIn('id', $this->grades)
                         ->get();
    }
}
