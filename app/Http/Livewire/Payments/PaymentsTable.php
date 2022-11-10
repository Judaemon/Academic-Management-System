<?php

namespace App\Http\Livewire\Payments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Payments;

class PaymentsTable extends DataTableComponent
{
    protected $model = Payments::class;

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function exportSelected()
    {
        foreach ($this->getSelected() as $item) {
            // These are strings since they came from an HTML element
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

            Column::make("Amount Paid")
                ->sortable()
                ->format(fn ($value) => 'Php ' . number_format($value, 2))
                ->collapseOnMobile(),

            Column::make("Payment Date", "created_at")
                ->sortable()
                ->format(fn ($value) => date('F j, Y', strtotime($value)))
                ->collapseOnMobile(),

            Column::make("Actions")
                ->label(
                    fn ($row, Column $column) => view('livewire.payment.actions-col')->withRow($row)
                )
                ->collapseOnMobile(),
        ];
    }
}
