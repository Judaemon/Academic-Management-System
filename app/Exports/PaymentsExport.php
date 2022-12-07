<?php

namespace App\Exports;

use App\Models\Payments;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;

use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Style;

class PaymentsExport implements FromCollection, WithHeadings, WithColumnWidths, WithMapping, WithDefaultStyles, WithEvents
{
    use Exportable;

    public $payments;

    public function __construct($payments) {
        $this->payments = $payments;
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'ORDER NO',
            'USER ID',
            'IN PAYMENT OF',
            'AMOUNT PAID',
            'BALANCE',
            'METHOD OF PAYMENT',
            'PAYMENT DATE',
            'STATUS'
        ];
    } 

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 30, 
            'C' => 30,
            'D' => 25,   
            'E' => 25, 
            'F' => 25,    
            'G' => 20, 
            'H' => 20,  
        ];
    }

    public function defaultStyles(Style $defaultStyle)
    {
        return [
            'fill' => [
                'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::BLACK],
            ],
            'font' => [
                'name' => 'Cambria',
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
    }

    public function collection()
    {
        return Payments::whereIn('id', $this->payments)
                         ->get();
    }

    public function map($row): array
    {
        if(!empty($row->others)) {
            $payment_type = $row->others;
        } else {
            $payment_type = $row->fee->fee_name;
        }

        return [
            $row->id,
            $row->user->first_name.' '.$row->user->last_name,
            $payment_type,
            $row->amount_paid,
            $row->balance,
            $row->payment_method,
            \PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel($row->created_at),
            $row->payment_status,                
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDefaultRowDimension()->setRowHeight(20);
                // $event->sheet->styleCells('A1:H1', [
                //     'font' => [
                //         'bold' => true,
                //     ]
                // ]);
            },
        ];
    }
}
