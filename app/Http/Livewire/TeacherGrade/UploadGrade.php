<?php

namespace App\Http\Livewire\TeacherGrade;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UploadGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $section_id;
    public $student_id;
    public $subject_id;

    public $first_quarter;
    public $second_quarter;
    public $third_quarter;
    public $fourth_quarter;

    public $grade;

    protected function rules()
    {
        return [
            'section_id' => ['required'],
            'student_id' => ['required'],
            'subject_id' => ['required'],

            'first_quarter' => ['nullable'],
            'second_quarter' => ['nullable'],
            'third_quarter' => ['nullable'],
            'fourth_quarter' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.teacher-grade.upload-grade');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Upload grades?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, upload it',
                'method' => 'submit',
                'params' => 'Uploaded',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $grade = Grade::create([
            'section_id' => $this->section_id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,

            'first_quarter' => $this->first_quarter,
            'second_quarter' => $this->second_quarter,
            'third_quarter' => $this->third_quarter,
            'fourth_quarter' => $this->fourth_quarter,
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grades successfully uploaded.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
