<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Payments;

class DeletePayment extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $payment;

    public function mount(Payments $payment)
    {
        $this->authorize('delete_payment');

        $this->payment = $payment;
    }

    public function render()
    {
        return view('livewire.payment.delete-payment');
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "This record will be Permanently Deleted",
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
        $this->payment->delete();

        $this->closeModal();
    
        $this->emit('refreshDatatable');
    
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Payment Record deleted successfully.'
        );
    }
}
