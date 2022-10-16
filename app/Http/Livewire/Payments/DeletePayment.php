<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use App\Models\Payments;
use WireUi\Traits\Actions;

class DeletePayment extends ModalComponent
{
    use Actions;

    public $payment;

    public function mount(Payments $payment)
    {
        $this->payment = $payment;
        $this->card_title = "Delete Payment Record";
    }

    public function render()
    {
        return view('livewire.payment.delete-payment');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "This payment record will be Permanently Deleted",
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
        if (!auth()->user()->can('delete_payment')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->payment->delete();

            $this->closeModal();
    
            $this->emit('refreshDatatable');
    
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Payment Record deleted successfully.'
            );
        }
    }
}
