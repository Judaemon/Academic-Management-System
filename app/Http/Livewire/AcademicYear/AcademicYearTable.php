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
            Column::make("Id")
                ->searchable()
                ->sortable(),

            Column::make("Start Date")
                ->searchable()
                ->format(fn($value) => date('F j, Y', strtotime($value))),

            Column::make("End Date")
                ->searchable()
                ->format(function($value) {
                    if($value != NULL) {
                        return date('F j, Y', strtotime($value));
                    } else {
                        return " ";
                    }
                }),

            Column::make("Number of School Days", "school_days")
                ->searchable()
                ->format(fn($value) => $value.' days')
                ->collapseOnMobile(),
                
            Column::make("Actions", "id")
                ->view('livewire.academic-year.actions-col')
                ->collapseOnMobile(),
        ];
    }

}
