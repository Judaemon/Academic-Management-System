<?php

namespace App\Exports;

use App\Models\Payments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PaymentsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
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
            '#',
            'USER ID',
            'AMOUNT PAID',
            'METHOD OF PAYMENT',
            'FEE ID',
            'BALANCE',
            'OTHERS',
            'PAYMENT DATE'
        ];
    } 

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 11, 
            'C' => 20,
            'D' => 25,   
            'E' => 15, 
            'F' => 15,    
            'G' => 47, 
            'H' => 30,  
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:H1' => [
                'font' => [
                    'bold' => true
                    ]
                ],
        ];
    }

    public function collection()
    {
        return Payments::select('id', 'user_id', 'amount_paid', 'payment_method', 'fee_id', 'balance', 'others', 'created_at')
                         ->whereIn('id', $this->payments)
                         ->get();
    }
}
