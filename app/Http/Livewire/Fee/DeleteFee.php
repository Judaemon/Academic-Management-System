<?php

namespace App\Http\Livewire\Fee;

use App\Models\Fee;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class DeleteFee extends ModalComponent
{
    use Actions;

    public $school_fee;

    public function mount(Fee $fee)
    {
        $this->fee = $fee;
        $this->card_title = "Delete ".$fee->fee_name;
    }

    public function render()
    {
        return view('livewire.fee.delete-fee');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete this fee?',
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
        ]);
    }

    public function submit()
    {
        // Check if user has permission
        if (!auth()->user()->can('delete_fee')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->fee->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Fee deleted successfully.'
            );
        }
    }
}
