<?php

namespace App\Http\Livewire\Fee;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Fee;
use App\Models\GradeLevel;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class FeesTable extends DataTableComponent
{
    protected $model = Fee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    //add grade_level_filter multi (use checkbox)

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
                ->format(fn($value) => 'Php '.number_format($value, 2))
                ->collapseOnMobile(),

            Column::make("Grade Level", "grade_level.name")
                ->sortable()
                ->collapseOnMobile(),

            Column::make("Actions", "id")
                ->view('livewire.fee.actions-col')
                ->collapseOnMobile(),
        ];
    }
}
