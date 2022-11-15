<?php

namespace App\Http\Livewire\StudentGrade;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use App\Models\Admission;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ViewGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade;
    public $subjects;
    public $admission;

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

    public function mount(Admission $admission)
    {
        $this->admission = $admission;
        $this->subjects = Subject::query()
            ->where('grade_level_id', $admission->admit_to_grade_level)
            ->with(['grades' => function ($q) use($admission) {
                    $q->where('student_id', $admission->student_id);
            }])
            ->get();
    }

    // public function test()
    // {
    //     dd($this->subjects);
    // }

    public function render()
    {
        return view('livewire.student-grade.view-grade');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
