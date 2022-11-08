<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

use Carbon\Carbon;

class CreateAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions, WithFileUploads;

    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $main_image;
    public $category;
    
    public $isNull = true;

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
        return view('livewire.announcement.create-announcement');
    }

    public function updatedStartDate()
    {
        if(!empty($this->start_date)) {
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
            'description' => 'Create Announcement?',
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
        $this->authorize('create_announcement');

        if(!empty($this->main_image)) {
            $this->main_image = $this->main_image->store('announcement', 'public');
        } else {
            $this->main_image = NULL;
        }

        Announcement::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => Carbon::parse($this->start_date)->toDateString(),
            'end_date' => Carbon::parse($this->end_date)->toDateString(),
            'category' => $this->category,
            'main_image' => $this->main_image,
        ]);

        if(!empty($this->main_image)) {

        } else {
            
        }

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Announcement successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
