<?php

namespace App\Http\Livewire\Subject;

use LivewireUI\Modal\ModalComponent;
use App\Models\Subject;

class ViewSubject extends ModalComponent
{
    public $subject;

    public $teacher;

    public $grade_level;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'subject.subject_code' => ['required'],
            'subject.teacher_id' => [],
            'subject.grade_level_id' => ['required'],
        ];
    }

    public function mount(Subject $subject)
    {
        $this->subject = $subject;

        $this->teacher = $subject->teacher->firstname.' '.$subject->teacher->lastname;
        $this->grade_level = $subject->grade_level->name;
    }

    public function render()
    {
        return view('livewire.subject.view-subject');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
