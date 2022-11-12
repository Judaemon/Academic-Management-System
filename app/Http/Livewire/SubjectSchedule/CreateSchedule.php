<?php

namespace App\Http\Livewire\SubjectSchedule;

use App\Models\SubjectSchedule;
use App\Models\User;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateSchedule extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $time;
    public $day;

    public $teacher_id;
    public $subject_id;
    public $student_id;

    protected function rules()
    {
        return [
            'time' => ['nullable'],
            'day' => ['nullable'],
            'teacher_id' => ['nullable'],
            'subject_id' => ['nullable'],
            'student_id' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.subject-schedule.create-schedule');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the schedule?',
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
        $schedule = SubjectSchedule::create([
            'time' => $this->time,
            'day' => $this->day,
            'teacher_id' => $this->teacher_id,
            'subject_id' => $this->subject_id,
            'student_id' => $this->student,
        ]);

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Schedule successfully created!'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
