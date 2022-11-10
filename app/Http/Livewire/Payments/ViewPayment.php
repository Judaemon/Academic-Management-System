<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Payments;

class ViewPayment extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $payment;

    public function mount(Payments $payment)
    {
        $this->authorize('read_payment');

        $this->payment = $payment;
    }

    public function render()
    {
        return view('livewire.payment.view-payment');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
