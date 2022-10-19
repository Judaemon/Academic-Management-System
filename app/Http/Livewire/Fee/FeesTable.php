<?php

namespace App\Http\Livewire\Fee;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Fee;

class FeesTable extends DataTableComponent
{
    protected $model = Fee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id")
                ->sortable(),

            Column::make("Fee Name", "fee_name")
                ->sortable()
                ->searchable(),

            Column::make("Amount")
                ->sortable()
                ->format(fn($value) => 'Php '.number_format($value, 2)),

            Column::make("Grade Level (if applicable)", "grade_level.name")
                ->sortable()
                ->searchable(),

            Column::make("Actions", "id")
                ->view('livewire.fee.actions-col'),
        ];
    }
}
