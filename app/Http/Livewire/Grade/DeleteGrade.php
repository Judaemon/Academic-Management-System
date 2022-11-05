<?php

namespace App\Http\Livewire\Grade;

use App\Models\Grade;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade;

    public function mount(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function render()
    {
        return view('livewire.grade.delete-grade');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this grade?',
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
        //$this->authorize('delete_grade');

        // Check if user has permission
        if (!auth()->user()->can('delete_grade')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->grade->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'grade deleted successfully.'
            );
        }
    }
}
