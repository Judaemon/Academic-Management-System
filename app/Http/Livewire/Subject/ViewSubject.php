<?php

namespace App\Http\Livewire\Subject;

use LivewireUI\Modal\ModalComponent;
use App\Models\Subject;

class ViewSubject extends ModalComponent
{
    public $subject;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'subject.teacher_id' => ['nullable'],
            'subject.subject_code' => ['required'],
        ];
    }
    
    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        $this->cardTitle = $subject->name." Information";
    }

    public function render()
    {
        return view('livewire.subject.view-subject');
    }
}
