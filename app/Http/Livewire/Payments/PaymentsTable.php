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

    public function columns(): array
    {
        return [
            Column::make("Id")
                ->sortable(),

            Column::make("Name", "user.firstname")
                ->sortable()
                ->searchable(),

            Column::make("Amount Paid")
                ->sortable()
                ->format(fn($value) => 'Php '.number_format($value, 2)),

            Column::make("Payment Date", "created_at")
                ->sortable()
                ->format(fn($value) => date('F j, Y', strtotime($value))),

            Column::make("Actions", "id")
                ->view('livewire.payment.actions-col'),
        ];
    }
}
