<?php

namespace App\Http\Livewire\Subject;

use App\Models\GradeLevel;
use App\Models\Subject;
use App\Rules\Teacher;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateSubject extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;
    public $subject_code;

    public $teacher;
    public $grade_level;

    protected function rules()
    {
        return [
            'name' => ['required'],
            'subject_code' => ['required'],

            'teacher' => ['required', new Teacher],
            'grade_level' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.subject.create-subject');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the subject?',
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
        $subject = Subject::create([
            'name' => $this->name,
            'subject_code' => $this->subject_code,

            'teacher_id' => $this->teacher,
            'grade_level_id' => $this->grade_level,
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
