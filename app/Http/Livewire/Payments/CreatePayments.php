<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use App\Models\User;
use App\Models\Payments;
use App\Models\Fee;
use WireUi\Traits\Actions;

class CreatePayments extends Component
{
    use Actions;

    public $modalCreate;
    public 
      $user_id,
      $amount_paid,
      $fee_id;

    public function render()
    {
        return view('livewire.payment.create-payments', [
            'fees' => Fee::all(),
            'users' => User::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'user_id' => 'required|unique:users,id,'.$this->user_id,
            'amount_paid' => 'required|numeric',
            'fee_id' => 'required|unique:fees,id,'.$this->fee_id
        ];
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
