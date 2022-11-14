<?php

namespace App\Http\Livewire\Payments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Payments;

use App\Exports\PaymentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use WireUi\Traits\Actions;
use PDF;

class PaymentsTable extends DataTableComponent
{
    use Actions;

    protected $model = Payments::class;

    public array $bulkActions = [
        'exportXLSX' => 'Export as XLSX',
        'exportCSV' => 'Export as CSV',
        'exportPDF' => 'Export as PDF',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array
    {
        $payment_status = ['Paid', 'Pending', 'Refunded'];

        $academic_year = [];

        return [
            SelectFilter::make('Payment Status')
                ->options($payment_status)
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('payment_status', $value);
                }),

            SelectFilter::make('Academic Year')
                ->options([
                    '' => 'All',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
        ];
    }

    public function exportXLSX()
    {
        $payments = $this->getSelected();
        
        if(!empty($payments)) {
            $this->clearSelected();
            return Excel::download(new PaymentsExport($payments), 'payments.xlsx');
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function exportCSV()
    {
        $payments = $this->getSelected();
        
        if(!empty($payments)) {
            $this->clearSelected();
            return Excel::download(new PaymentsExport($payments), 'payments.csv');
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function exportPDF()
    {   $payments = $this->getSelected();

        if(!empty($payments)) {
            $this->clearSelected();
            return (new PaymentsExport($payments))->download('payments.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } else {
            $this->dialog()->error(
                $title = 'No Payments Selected',
                $description = "Please select which payments to export",
            );
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id")
                ->sortable(),

            Column::make("First Name", "user.first_name")
                ->sortable()
                ->searchable(),

            Column::make("Last Name", "user.last_name")
                ->sortable()
                ->searchable(),

            Column::make("Payment Date", "created_at")
                ->sortable()
                ->format(fn ($value) => date('F j, Y', strtotime($value)))
                ->collapseOnMobile(),

            Column::make("Status", "payment_status")
                ->sortable()
                ->collapseOnMobile(),

            Column::make("Actions")
                ->label(
                    fn ($row, Column $column) => view('livewire.payment.actions-col')->withRow($row)
                )
                ->collapseOnMobile(),
        ];
    }
}
