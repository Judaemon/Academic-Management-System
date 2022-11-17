<?php

namespace App\Http\Livewire\StudentGrade;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use App\Models\Admission;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentGradesExport;
use WireUi\Traits\Actions;
use PDF;

class ViewGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade;
    public $subjects;
    public $admission;
    public $grades;

    protected function rules()
    {
        return [
            'subject_id' => ['required'],

            'first_quarter' => ['nullable'],
            'second_quarter' => ['nullable'],
            'third_quarter' => ['nullable'],
            'fourth_quarter' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.student-grade.view-grade');
    }

    public function mount(Admission $admission)
    {
        $this->admission = $admission;

        $this->subjects = Subject::query()
            ->where('grade_level_id', $admission->admit_to_grade_level)
            ->with(['grades' => function ($q) use($admission) {
                    $q->where('student_id', $admission->student_id);
            }])
            ->get();
        
        // pa-check nalang, ginaya ko yung sa taas para makuha din yung student and makuha yung tamang subjects sa modal,
        // triny ko tignan na yung kay cayden and kay kyla lao is tama na yung mga subjects
        $this->grades = Subject::query()
            ->where('grade_level_id', $this->admission->admit_to_grade_level)
            ->with(['grades' => function ($q) use($admission) {
                $q->where('student_id', $admission->student_id);
            }])
            ->get();
    }

    public function downloadGrade()
    {
        // $grades = $this->getSelected();
        // for testing pdf layout on download
        $grades = $this->getRules();

        if (!empty($grades)) {
            // $this->clearSelected();
            return (new StudentGradesExport($grades))->download('Grades.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } else {
            $this->dialog()->error(
                $title = 'Nothing Selected',
                $description = "Please select which students/grades to export",
            );
        }
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
