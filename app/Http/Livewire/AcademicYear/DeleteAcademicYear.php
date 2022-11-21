<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\AcademicYear;

class DeleteAcademicYear extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
        $this->authorize('delete_academic_year');

        $this->academic_year = $academic_year;
    }

    public function render()
    {
        return view('livewire.academic-year.delete-academic-year');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete Academic Year?',
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
        $this->academic_year->delete();

        $this->closeModal();
    
        $this->emit('refreshDatatable');
    
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Academic year deleted successfully.'
        );
    }
}
