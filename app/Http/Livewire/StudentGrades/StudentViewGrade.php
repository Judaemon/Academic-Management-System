<?php

namespace App\Http\Livewire\StudentGrades;

use LivewireUI\Modal\ModalComponent;
use App\Models\Grade;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\User;

class StudentViewGrade extends ModalComponent
{
    public $grade;

    public $subject;

    public $student;

    public $grade_level_subjects = [];

    protected function rules()
    {
        return [
            'grade.first_quarter' => ['nullable'],
            'grade.second_quarter' => ['nullable'],
            'grade.third_quarter' => ['nullable'],
            'grade.fourth_quarter' => ['nullable'],

            //'grade.subject_grade_level' => ['nullable'],
            'grade.student_id' => ['nullable'],  
        ];
    }

    public function mount(Grade $grade)
    {
        $this->grade = $grade;

        $this->student = $subject->student->firstname.' '.$subject->student->lastname;
        $this->grade_level_subjects = GradeLevel::query()
            ->find($section->grade_level_id)
            ->subjects;
    }

    public function render()
    {
        return view('livewire.student-grade.student-view-grade');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
