<?php

namespace App\Http\Livewire\Subject;

use App\Models\GradeLevel;
use App\Models\Subject;
use App\Rules\Teacher;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditSubject extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $subject;

    public $teacher;
    public $grade_level;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'teacher' => ['required', new Teacher],
            'subject.teacher_id' => [],
            'subject.subject_code' => ['required'],
            'grade_level' => ['required'],
        ];
    }

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        
        // pass selected values to select
        $this->teacher = $subject->teacher_id;
        $this->grade_level = (string)$subject->grade_level_id;

        // select options
        $this->grade_levels = GradeLevel::all();
    }

    public function render()
    {
        return view('livewire.subject.edit-subject');
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
        $this->authorize('update_subject');

        $this->subject->teacher_id = $this->teacher;
        $this->subject->grade_level_id = $this->grade_level;

        $this->subject->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
