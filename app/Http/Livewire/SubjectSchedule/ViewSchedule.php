<?php

namespace App\Http\Livewire\SubjectSchedule;

use LivewireUI\Modal\ModalComponent;
use App\Models\SubjectSchedule;
use App\Models\Subject;
use App\Models\User;

class ViewSchedule extends ModalComponent
{
    public $schedule;

    public $subject;

    protected function rules()
    {
        return [
            'schedule.time' => ['nullable'],
            'schedule.day' => ['nullable'],
            'schedule.teacher_id' => ['nullable'],
            'schedule.subject_id' => ['nullable'],
            'schedule.student_id' => ['nullable'],
        ];
    }

    public function mount(SubjectSchedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function render()
    {
        return view('livewire.subject-schedule.view-schedule');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
