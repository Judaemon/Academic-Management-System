<?php

namespace App\Http\Livewire\StudentGrades;

use App\Models\Grade;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentEditGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade;

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

    public function mount(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function render()
    {
        return view('livewire.student-grade.student-edit-grade');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('update_grade');

        $this->grade->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grade information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
