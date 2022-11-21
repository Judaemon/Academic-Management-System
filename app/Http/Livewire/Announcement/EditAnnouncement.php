<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

use Carbon\Carbon;

class EditAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions, WithFileUploads;

    public $announcement;

    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $category;
    public $main_image;

    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement;

        $this->title = $announcement->title;
        $this->description = $announcement->description;
        $this->start_date = $announcement->start_date;
        $this->end_date = $announcement->end_date;
        $this->category = $announcement->category;
        $this->main_image = $announcement->main_image;
    }

    protected function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'category' => ['required'],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
        ];
    }

    public function render()
    {
        return view('livewire.announcement.edit-announcement');
    }

    public function removeImage()
    {
        $this->main_image = NULL;
    }
    
    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Update Announcement?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, update it',
                'method' => 'submit',
                'params' => 'Update',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('update_announcement');

        if(!empty($this->main_image)) {
            if($this->main_image != $this->announcement->main_image) {
                $this->main_image = $this->main_image->store('announcement', 'public');
            }
        } else {
            $this->main_image = NULL;
        }
        
        $this->announcement->forceFill([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => Carbon::parse($this->start_date)->toDateString(),
            'end_date' => Carbon::parse($this->end_date)->toDateString(),
            'category' => $this->category,
            'main_image' => $this->main_image,
        ])->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Announcement successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
