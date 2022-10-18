<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Payments;
use App\Models\Fee;

class CreatePayments extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $user;
    public $users;

    public $amount_paid;

    public $fee;
    public $fees;

    public $others;

    protected function rules()
    {
        return [
            'user' => ['required', 'unique:users,id,'.$this->user],
            'amount_paid' => ['required', 'numeric'],
            'fee' => ['nullable', 'unique:fees,id,'.$this->fee],
            'others' => ['nullable', 'min:5', 'max:35'],
        ];
    }

    public function mount()
    {
        $this->users = User::all();
        $this->fees = Fee::all();
    }

    public function render()
    {
        return view('livewire.payment.create-payments');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Record Payment',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, record it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('create_payment');

        Payments::create([
            'user_id' => $this->user,
            'amount_paid' => $this->amount_paid,
            'fee_id' => $this->fee,
            'others' => $this->others,
        ]);
    
        $this->emit('refreshDatatable');
    
        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Payment has been Recorded.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
