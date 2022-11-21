<?php

namespace App\Http\Livewire\GradeLevel;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Builder;


class GradeLevelTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return GradeLevel::query()
            ->whereHas('program', function ($q) {
                $q->where('isEnabled', true);
            });
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),
            Column::make("Program", "program.name")
                ->searchable()
                ->sortable(),
            Column::make("Grade Level", "name")
                ->searchable()
                ->sortable(),
        ];

        if (auth()->user()->can('read_grade_level') || auth()->user()->can('update_grade_level') || auth()->user()->can('delete_grade_level')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.grade-level.actions-col'));
        }

        return $columns;
    }
}
