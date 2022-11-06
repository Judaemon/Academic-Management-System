<?php

namespace App\Http\Livewire\StudentGrades;

use App\Models\Grade;
use App\Models\User;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentCreateGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $first_quarter;
    public $second_quarter;
    public $third_quarter;
    public $fourth_quarter;

    //public $subject_grade_level;
    public $student_id;

    protected function rules()
    {
        return [
            'first_quarter' => ['nullable'],
            'second_quarter' => ['nullable'],
            'third_quarter' => ['nullable'],
            'fourth_quarter' => ['nullable'],

            //'subject_grade_level' => ['nullable'],
            'student_id' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.student-grade.student-create-grade');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the grade?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $grade = Grade::create([
            'first_quarter' => $this->first_quarter,
            'second_quarter' => $this->second_quarter,
            'third_quarter' => $this->third_quarter,
            'fourth_quarter' => $this->fourth_quarter,

            //'subject_grade_level' => $this->subject,
            'student_id' => $this->student,
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grade successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
