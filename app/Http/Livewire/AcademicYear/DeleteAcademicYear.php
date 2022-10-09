<?php

namespace App\Http\Livewire\AcademicYear;

use App\Models\AcademicYear;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class DeleteAcademicYear extends ModalComponent
{
    use Actions;

    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
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
            'description' => 'Delete this academic year?',
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
        // Check if user has permission
        if (!auth()->user()->can('delete_academic_fee')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->academic_year->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Academic year deleted successfully.'
            );
        }
    }
}
