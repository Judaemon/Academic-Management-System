<?php

namespace App\Http\Livewire\Subject;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

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

    public function filters(): array
    {
        $option = GradeLevel::query()
            ->pluck('name')
            ->toArray();

        $option = array_combine($option, $option);

        return [
            SelectFilter::make('Grade Level')
                ->options($option)
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('grade_levels.name', $value);
                }),
        ];
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
