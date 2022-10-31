<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

class DeleteAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $announcement;

    public function mount(Announcement $announcement)
    {
        $this->authorize('delete_announcement');

        $this->announcement = $announcement;
    }

    public function render()
    {
        return view('livewire.announcement.delete-announcement');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "This Announcement will be Permanently Deleted",
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
        ]);
    }

    public function submit()
    {
        $this->announcement->delete();

        $this->closeModal();
    
        $this->emit('refreshDatatable');
    
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Announcement deleted successfully.'
        );
    }
}
