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
            'user_id' => 'required|unique:users,id,'.$this->user_id,
            'amount_paid' => 'required|numeric',
            'fee_id' => 'required|unique:fees,id,'.$this->fee_id
        ];
    }

    public function mount()
    {
        $this->users = GradeLevel::all();
        $this->fees = Fee::all();
    }

    public function render()
    {
        return view('livewire.payment.create-payments');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

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
        if (!auth()->user()->can('create_payment')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            Payments::create([
                'user_id' => $this->user_id,
                'amount_paid' => $this->amount_paid,
                'fee_id' => $this->fee_id,
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Payment has been Recorded.'
            );
        }
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
