<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

use Carbon\Carbon;

class EditAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $announcement;

    public $title;
    public $description;
    public $date;
    public $main_image;

    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement;

        $this->title = $announcement->title;
        $this->school_days = $announcement->school_days;
        $this->end_date = $announcement->end_date;
    }

    protected function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'date' => ['required', 'date'],
            'main_image' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.announcement.edit-announcement');
    }
}
