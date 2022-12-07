<?php

namespace App\Http\Livewire\Payments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\AcademicYear;
use App\Models\Payments;

use App\Exports\PaymentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;

class PaymentsTable extends DataTableComponent
{

    protected $model = Payments::class;

    public array $bulkActions = [
        'exportXLSX' => 'Export as XLSX',
        'exportCSV' => 'Export as CSV',
        'exportPDF' => 'Export as PDF',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('payment_status')) {
                return ['class' => 'flex justify-center mt-1',];
            }
            return ['class' => 'text-center',];
        });
    }

    public function exportXLSX()
    {
        $payments = $this->getSelected();

        if (!empty($payments)) {
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

        if (!empty($payments)) {
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
    {
        $payments = $this->getSelected();

        if (!empty($payments)) {
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
            Column::make("Or No", "id")
                ->sortable(),

            Column::make("Name", "user_id")
                ->sortable()
                ->searchable(
                    fn (Builder $query, $term) =>
                    $query->whereHas('user', function ($query) use ($term) {
                        $query->where('first_name', 'like', '%' . $term . '%')
                            ->orWhere('last_name', 'like', '%' . $term . '%');
                    })
                )
                ->format(fn ($value, $row) => $row->user->first_name . ' ' . $row->user->last_name)
                ->eagerLoadRelations(),

            Column::make("Status", "payment_status")
                ->sortable()
                ->format(function ($value) {
                    if ($value === 'Pending') {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-indigo-300 text-indigo-700 font-bold text-xs uppercase">' . $value . '</div>';
                    } if ($value === 'Paid') {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-green-300 text-green-700 font-bold text-xs uppercase">' . $value . '</div>';
                    } else {
                        return '<div class="w-32 py-1 text-center rounded-full shadow-sm bg-orange-300 text-orange-700 font-bold text-xs uppercase">' . $value . '</div>';
                    }
                })
                ->html()
                ->collapseOnTablet(),

            Column::make("Payment Date", "created_at")
                ->sortable()
                ->format(fn ($value) => date('F j, Y', strtotime($value)))
                ->collapseOnTablet(),

            Column::make("Actions")
                ->label(fn ($row, Column $column) => view('livewire.payment.actions-col')->withRow($row))
                ->collapseOnTablet(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Payment Status')
                ->options([
                    '' => 'All',
                    'Paid' => 'Paid',
                    'Pending' => 'Pending',
                    'Refunded' => 'Refunded'
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'Paid') {
                        $builder->where('payment_status', 'Paid');
                    } else if ($value === 'Pending') {
                        $builder->where('payment_status', 'Pending');
                    } else {
                        $builder->where('payment_status', 'Refunded');
                    }
                }),
        ];
    }

    public function builder(): Builder
    {
        return Payments::whereHas('academic_year', function ($query) {
            $query->where('status', "Ongoing");
        });
    }
}
