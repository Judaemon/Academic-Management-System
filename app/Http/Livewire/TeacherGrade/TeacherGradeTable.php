<?php

namespace App\Http\Livewire\TeacherGrade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;
use App\Models\Grade;
use App\Exports\GradesExport;

use Maatwebsite\Excel\Facades\Excel;
use WireUi\Traits\Actions;
use PDF;
use Illuminate\Database\Eloquent\Builder;

class TeacherGradeTable extends DataTableComponent
{
    use Actions;

    protected $section;

    protected $model = Grade::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public array $bulkActions = [
        'exportXLSX' => 'Export as XLSX',
        'exportCSV' => 'Export as CSV',
        'exportPDF' => 'Export as PDF',
    ];

    public function builder(): Builder
    {
        return User::query()
            ->whereHas('admission', function ($q) {
                $q->where('academic_year_id', setting('academic_year_id'));
                $q->whereHas('section', function ($q) {
                    $q->where('teacher_id', auth()->user()->id);
                });
            });
    }

    public function exportXLSX()
    {
        $grade = $this->getSelected();

        if (!empty($grade)) {
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

        if (!empty($grade)) {
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
    {
        $grade = $this->getSelected();

        if (!empty($grade)) {
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
            Column::make("Student", "id")
                ->sortable()
                ->searchable(),
            Column::make("Student")
                ->label(
                    fn ($row) =>  User::find($row->id)->complete_name
                )
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.teacher-grade.actions-col'),
        ];
    }
}
