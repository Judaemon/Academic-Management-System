<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

class ViewAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $announcement;

    public function mount(Announcement $announcement)
    {
        $this->authorize('view_announcement');

        $this->announcement = $announcement;
    }

    public function render()
    {
        return view('livewire.announcement.view-announcement');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
