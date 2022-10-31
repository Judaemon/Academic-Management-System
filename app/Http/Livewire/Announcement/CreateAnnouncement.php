<?php

namespace App\Http\Livewire\Announcement;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Announcement;

use Carbon\Carbon;

class CreateAnnouncement extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $title;
    public $description;
    public $date;
    public $main_image;
    // public $category;

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
        return view('livewire.announcement.create-announcement');
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

        Announcement::create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => Carbon::parse($this->date)->toDateString(),
            'main_image' => $this->main_image,
        ]);

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
