<?php

namespace App\Http\Livewire\Subject;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;

class SubjectTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Subject::query()
            ->whereHas('grade_level', function ($q) {
                $q->whereHas('program', function ($q) {
                    $q->where('isEnabled', true);
                });
            });
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Grade Level", "grade_level.name")
                ->sortable()
                ->searchable(),
            Column::make("Teacher", "teacher.first_name")
                ->sortable()
                ->searchable(),
            Column::make("Subject Code", "subject_code")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.subject.actions-col'),
        ];
    }
}
