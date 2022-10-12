<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateSubject extends Component
{
    use Actions;

    public $modalCreate;

    public $subject;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'subject.teacher_id' => ['nullable'],
            'subject.subject_code' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.subject.create-subject');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

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
        Subject::create([
            'name' => $this->subject['name'],
            'teacher_id' => $this->subject['teacher_id'],
            'subject_code' => $this->subject['subject_code'],
        ]);

        $this->emit('refreshDatatable');

        $this->reset();
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Subject successfully Created.'
        );
    }
    
    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
