<?php

namespace App\Http\Livewire\TeacherGrade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Grade;
use App\Exports\GradesExport;

use Maatwebsite\Excel\Facades\Excel;
use WireUi\Traits\Actions;
use PDF;
use Illuminate\Database\Eloquent\Builder;

class TeacherGradeTable extends DataTableComponent
{

    protected $section;
    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    //protected $model = Grade::class;

    public array $bulkActions = [
        'exportXLSX' => 'Export as XLSX',
        'exportCSV' => 'Export as CSV',
        'exportPDF' => 'Export as PDF',
    ];

    public function builder(): Builder
    {
        // $this->sections = Section::query()
        //     ->where('teacher_id', 5)
        //     ->firstOrFail();

        return User::query()
            ->whereHas('admission', function ($q) {
                $q->where('section_id', $this->section);
            });
    }

    public function mount($section)
    {
        $this->section = $section;
    }

    // public function builder(): Builder
    // {
    //     return Subject::query()
    //         ->whereHas('grade_level', function ($q) {
    //             $q->whereHas('program', function ($q) {
    //                 $q->where('isEnabled', true);
    //             });
    //         });
    // }

    public function exportXLSX()
    {
        $grade = $this->getSelected();
        
        if(!empty($grade)) {
            $this->clearSelected();
            return Excel::download(new GradesExport($grade), 'grades.xlsx');
        } else {
            $this->dialog()->error(
                $title = 'Nothing Selected',
                $description = "Please select which students/grades to export",
            );
        }
    }

    public function exportCSV()
    {
        $grade = $this->getSelected();
        
        if(!empty($grade)) {
            $this->clearSelected();
            return Excel::download(new GradesExport($grade), 'grades.csv');
        } else {
            $this->dialog()->error(
                $title = 'Nothing Selected',
                $description = "Please select which students/grades to export",
            );
        }
    }

    public function exportPDF()
    {   $grade = $this->getSelected();

        if(!empty($grade)) {
            $this->clearSelected();
            return (new GradesExport($grade))->download('grades.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
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
            Column::make("Student", "first_name")
                ->sortable()
                ->searchable(),
            // Column::make("Subject", "id")
            //     ->sortable()
            //     ->searchable(),
            // Column::make("First Quarter", "first_quarter")
            //     ->sortable()
            //     ->searchable(),
            // Column::make("Second Quarter", "second_quarter")
            //     ->sortable()
            //     ->searchable(),
            // Column::make("Third Quarter", "third_quarter")
            //     ->sortable()
            //     ->searchable(),
            // Column::make("Fourth Quarter", "fourth_quarter")
            //     ->sortable()
            //     ->searchable(),
            Column::make("Actions", "id")->view('livewire.teacher-grade.actions-col'),
        ];
    }
}
