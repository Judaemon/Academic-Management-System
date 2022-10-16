<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class DeleteSection extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $section;

    public function mount(Section $section)
    {
        $this->authorize('delete_section');

        $this->section = $section;
    }

    public function render()
    {
        return view('livewire.section.delete-section');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this section?',
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
        $this->section->delete();

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section deleted successfully.'
        );
    }
}
