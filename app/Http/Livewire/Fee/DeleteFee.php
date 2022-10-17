<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Fee;

class DeleteFee extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $fee;

    public function mount(Fee $fee)
    {
        $this->authorize('delete_fee');

        $this->fee = $fee;
    }

    public function render()
    {
        return view('livewire.fee.delete-fee');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => $this->fee->fee_name." will be Permanently Deleted",
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
        $this->fee->delete();

        $this->closeModal();
    
        $this->emit('refreshDatatable');
    
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Fee deleted successfully.'
        );
    }
}
