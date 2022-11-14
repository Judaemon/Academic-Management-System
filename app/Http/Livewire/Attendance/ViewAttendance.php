<?php

namespace App\Http\Livewire\Attendance;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Attendance;

class ViewAttendance extends ModalComponent
{
    use AuthorizesRequests;

    public $attendance;
   
    public function mount(Attendance $attendance)
    {
        $this->authorize('view_attendance');

        $this->attendance = $attendance;

        $this->attendance_date = $attendance->attendance_date;
        $this->status = $attendance->status;
        $this->student_id = $attendance->student_id;
    }

    public function render()
    {
        return view('livewire.attendance.view-attendance');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
