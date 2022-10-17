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
        return [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),

            Column::make("Start Date", "start_date")
                ->searchable()
                ->sortable()
                ->format(function($value) {
                    return date('j \\ F Y', strtotime($value));
                }),

            Column::make("Number of School Days", "school_days")
                ->searchable()
                ->sortable()
                ->format(function($value) {
                    return $value.' days';
                }),

            Column::make("End Date", "end_date")
                ->searchable()
                ->sortable()
                ->format(function($value) {
                    if($value != NULL) {
                        return date('j \\ F Y', strtotime($value));
                    } else {
                        return " ";
                    }
                }),
                
            Column::make("Actions", "id")
                ->view('livewire.academic-year.actions-col'),
        ];
    }

}
