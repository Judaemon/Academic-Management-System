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
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Payment value", "payment_value")
                ->sortable(),
            Column::make("Academic year id", "academic_year_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];

        if (auth()->user()->can('read_user')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.academic-year.actions-col'));
        }

        return $columns;
    }
}
