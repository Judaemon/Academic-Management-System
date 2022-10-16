<?php

namespace App\Http\Livewire\GradeLevel;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GradeLevel;

class GradeLevelTable extends DataTableComponent
{
    protected $model = GradeLevel::class;

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
            Column::make("Grade Level", "name")
                ->searchable()
                ->sortable(),
        ];

        if (auth()->user()->can('read_grade_levels') || auth()->user()->can('update_grade_levels') || auth()->user()->can('delete_grade_levels')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.grade-level.actions-col'));
        }

        return $columns;
    }

}
