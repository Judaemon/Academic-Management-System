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
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Fee Name", "fee_name")
                ->sortable(),
            Column::make("Fee Cost", "cost")
                ->sortable(),
            // Column::make("Grade Level", "grade_level_id")
            //     ->sortable(),
        ];

        if (auth()->user()->can('read_fees')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.fee.actions-col'));
        }

        return $columns;
    }
}
