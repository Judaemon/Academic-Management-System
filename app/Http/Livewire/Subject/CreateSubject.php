<?php

namespace App\Http\Livewire\Subject;

use App\Models\GradeLevel;
use App\Models\Subject;
use App\Rules\Teacher;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class CreateSubject extends ModalComponent
{
    use Actions;

    public $subject;

    public $teacher;

    public $grade_level;

    public $grade_levels;
    
    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'teacher' => ['required', new Teacher],
            'subject.subject_code' => ['required'],
            'grade_level' => ['required'],
        ];
    }


    public function mount()
    {
        $this->grade_levels = GradeLevel::all();
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
        
        $tst =Subject::create([
            'name' => $this->subject['name'],
            'subject_code' => $this->subject['subject_code'],

            'teacher_id' => $this->teacher,
            'grade_level_id' => $this->grade_level,

        ]);

        // dd($tst);

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
