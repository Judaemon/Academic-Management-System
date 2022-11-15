<?php

namespace App\Http\Livewire\Attendance;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Attendance;

use Carbon\Carbon;

class EditAttendance extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $attendance_date;
    public $status;
    public $student_id;

    public function mount(Attendance $attendance)
    {
        $this->attendance = $attendance;

        $this->attendance_date = $attendance->attendance_date;
        $this->status = $attendance->status;
        $this->student_id = $attendance->student_id;
    }

    protected function rules()
    {
        return [
            'attendance_date' => ['required', 'date'],
            'status' => ['nullable'],
            'student_id' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.attendance.edit-attendance');
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
        $this->authorize('update_attendance');
        
        $this->attendance->forceFill([
            'attendance_date' => Carbon::parse($this->attendance_date)->toDateString(),
            'status' => $this->status,
            'student_id' => $this->student_id,
        ])->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Attendance successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
