<?php

namespace App\Http\Livewire\Payments;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Payments;

class PaymentsTable extends DataTableComponent
{
    protected $model = Payments::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User", "user.firstname", " ", "user.lastname")
                ->sortable(),
            Column::make("Amount Paid", "amount_paid")
                ->sortable(),
            Column::make("Fee Type", "fee.fee_name")
                ->sortable(),
            Column::make("Fee Amount", "fee.amount")
                ->sortable(),
        ];

        if (auth()->user()->can('read_payments')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.payment.actions-col'));
        }

        return $columns;
    }
}
