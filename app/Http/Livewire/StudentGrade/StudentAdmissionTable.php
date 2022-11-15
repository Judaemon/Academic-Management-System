<?php

namespace App\Http\Livewire\StudentGrade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Grade;
use App\Models\Admission;
use App\Exports\StudentGradesExport;

use Maatwebsite\Excel\Facades\Excel;
use WireUi\Traits\Actions;
use PDF;
use Illuminate\Database\Eloquent\Builder;

class StudentAdmissionTable extends DataTableComponent
{
    use Actions;
    
    protected $grade;
    
    protected $model = Grade::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public array $bulkActions = [
        'exportPDF' => 'Export as PDF',
    ];

    public function builder(): Builder
    {
        return Admission::query()
            ->where('student_id', auth()->user()->id);
    }

    public function mount($section)
    {
        $this->section = $section;
    }

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
            Column::make("Grade Level", "grade_level.name")
                ->sortable()
                ->searchable(),
            Column::make("Academic year", "academic_year.title")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.student-grade.actions-col'),
        ];
    }
}
