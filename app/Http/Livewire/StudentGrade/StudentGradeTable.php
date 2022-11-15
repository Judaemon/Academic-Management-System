<?php

namespace App\Http\Livewire\StudentGrade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Builder;

class StudentGradeTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    protected $model = Grade::class;

    // public function builder(): Builder
    // {
    //     $this->sections = Section::query()
    //         ->where('teacher_id', 5)
    //         ->firstOrFail();

    //     $this->section_students = User::query()
    //         ->whereHas('admission', function ($q) {
    //             $q->where('section_id', $this->section->id);
    //         })
    //         ->with('grades')
    //         ->get();
    // }

    public function columns(): array
    {
        return [
            Column::make("Subject", "subject.name")
                ->sortable()
                ->searchable(),
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
