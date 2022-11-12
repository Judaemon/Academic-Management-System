<?php

namespace App\Http\Livewire\SubjectSchedule;

use App\Models\SubjectSchedule;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditSchedule extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $schedule;

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
        return view('livewire.subject-schedule.edit-schedule');
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
        //$this->authorize('update_schedule');

        $this->schedule->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Schedule information successfully saved!'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
