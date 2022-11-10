<?php

namespace App\Http\Livewire\StudentGrades;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Grade;

class StudentGradeTable extends DataTableComponent
{
    protected $model = Grade::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // $this->setSearchDebounce(1000);
    }

    // FILTER FOR STUDENTS - SECTION OR PARANG YUNG ADIMISSION LEVEL SOMETHING(?)
    // public function filters(): array
    // {
    //     $option = Section::query()
    //         ->pluck('section_id')
    //         ->toArray();

    //     $option = array_combine($option, $option);

    //     return [
    //         SelectFilter::make('Section')
    //             ->options($option)
    //             ->filter(function (Builder $builder, string $value) {
    //                 $builder->section($value);
    //             }),
    //     ];
    // }
    
    public function columns(): array
    {
        return [
            // Column::make("Subject", "subject_grade_level")
            //     ->sortable()
            //     ->searchable(),
            Column::make("First Quarter", "first_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Second Quarter", "second_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Third Quarter", "third_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Fourth Quarter", "fourth_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.student-grade.actions-col'),
        ];
    }
}
