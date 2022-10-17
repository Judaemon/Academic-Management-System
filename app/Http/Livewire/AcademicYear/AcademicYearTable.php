<?php

namespace App\Http\Livewire\AcademicYear;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AcademicYear;

class AcademicYearTable extends DataTableComponent
{
    protected $model = AcademicYear::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
            ->searchable()
                ->sortable(),
            Column::make("Year", "start_year")
                ->searchable()
                ->sortable(),
            Column::make("Year", "end_year")
                ->searchable()
                ->sortable(),
        ];

        if (auth()->user()->can('read_academic_years') || auth()->user()->can('update_academic_years') || auth()->user()->can('delete_academic_years')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.academic-year.actions-col'));
        }

        return $columns;
    }

}
