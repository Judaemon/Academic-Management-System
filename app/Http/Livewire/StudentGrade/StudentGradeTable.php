<?php

namespace App\Http\Livewire\StudentGrade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Grade;
use App\Exports\StudentGradesExport;

use Maatwebsite\Excel\Facades\Excel;
use WireUi\Traits\Actions;
use PDF;
use Illuminate\Database\Eloquent\Builder;

class StudentGradeTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    protected $model = Grade::class;

    public array $bulkActions = [
        'exportPDF' => 'Export as PDF',
    ];

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

    public function exportPDF()
    {   $grade = $this->getSelected();

        if(!empty($grade)) {
            $this->clearSelected();
            return (new StudentGradesExport($grade))->download('grades.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } else {
            $this->dialog()->error(
                $title = 'Nothing Selected',
                $description = "Please select which students/grades to export",
            );
        }
    }

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
