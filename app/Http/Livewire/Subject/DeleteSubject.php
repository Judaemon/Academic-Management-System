<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteSubject extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $subject;

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function render()
    {
        return view('livewire.subject.delete-subject');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this subject?',
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
        $this->authorize('delete_subject');

        // Check if user has permission
        if (!auth()->user()->can('delete_subject')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->subject->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Subject deleted successfully.'
            );
        }
    }
}
