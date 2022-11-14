<?php

namespace App\Http\Livewire\Attendance;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Attendance;

class DeleteAttendance extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $attendance;

    public function mount(Attendance $attendance)
    {
        $this->authorize('delete_attendance');

        $this->attendance = $attendance;
    }

    public function render()
    {
        return view('livewire.attendance.delete-attendance');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete Attendance?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'submit',
                'params' => 'Deleted',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'closeModal',
            ],
            'onDismiss' => [
                'method' => 'closeModal',
                'params' => 'closeModal',
            ],
        ]);
    }

    public function submit()
    {
        $this->attendance->delete();

        $this->closeModal();
    
        $this->emit('refreshDatatable');
    
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Attendance deleted successfully.'
        );
    }
}
