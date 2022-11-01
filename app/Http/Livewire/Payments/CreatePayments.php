<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;
use App\Models\Payments;
use App\Models\Fee;

use Auth;

class CreatePayments extends Component
{
    use AuthorizesRequests, Actions;

    public $name;
    public $amount_paid;
    public $school_fee;
    public $payment_method;
    public $others;

    public $isNull = true;
    public $isOthers = false;

    public $grade_level_fees;
    public $user_payments;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:users,id,'.$this->name],
            'amount_paid' => ['required', 'numeric'],
            'school_fee' => ['nullable', 'unique:fees,id,'.$this->school_fee],
            'payment_method' => ['required'],
            'others' => ['nullable'],
        ];
    }

    public function mount()
    {
        $this->authorize('create_payment');
    }

    public function render()
    {
        return view('livewire.payment.create-payments');
    }

    public function updatedName()
    {
        if(!empty($this->name)) {
            $this->isNull = false;
            $this->user_payments = Payments::where('user_id', $this->name)->get();
        } else {
            $this->isNull = true;
            $this->grade_level_fees = NULL;
            $this->user_payments = NULL;
        }
    }

    public function toggleOthers()
    {
        if($this->isOthers === false) {
            $this->isOthers = true;
            $this->school_fee = NULL;
        } else {
            $this->isOthers = false;
        }

    }

    public function resetForm()
    {
        $this->name = '';
        $this->amount_paid = '';
        $this->school_fee = '';
        $this->others = '';
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
        Payments::create([
            'user_id' => $this->name,
            'accountant_id' => Auth::user()->id,
            'amount_paid' => $this->amount_paid,
            'fee_id' => $this->school_fee,
            'payment_method' => $this->payment_method,
            'others' => $this->others,
        ]);
    
        $this->emit('refreshDatatable');
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Payment has been Recorded.'
        );

        return redirect()->route('payments.index');
    }
}
