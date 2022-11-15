<?php

namespace App\Http\Livewire\Attendance;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateAttendance extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $attendance_date;
    public $status;

    public $student_id;

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
        return view('livewire.attendance.create-attendance');
    }

    public function updatedDate()
    {
        if(!empty($this->attendance_date)) {
            $this->isNull = false;
        } else {
            $this->isNull = true;
        }
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create Attendance?',
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
        $this->authorize('create_attendance');

        Attendance::create([
            'attendance_date' => Carbon::parse($this->attendance_date)->toDateString(),
            'status' => $this->status,
            'student_id' => $this->student_id,
        ]);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Attendance successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
