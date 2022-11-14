<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;
use App\Models\Payments;
use App\Models\User;
use App\Models\Fee;

use Auth;

class CreatePayments extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;
    public $amount_paid;
    public $payment_method;
    public $balance;
    public $school_fee;
    public $others;

    public $total;
    public $payment_options;
    public $payment_history_latest;

    public $isNull = true;

    public $school_fees;
    public $payment_history;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:users,id,'.$this->name],
            'amount_paid' => ['required', 'numeric'],
            'school_fee' => ['nullable', 'unique:fees,id,'.$this->school_fee],
            'balance' => ['nullable', 'numeric'],
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
            $user = Admission::where('student_id', $this->name)->first();
            
            if(!empty($user)) {
                $this->isNull = false;
                $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
                $this->total = $this->school_fees->sum('amount');

                $this->payment_history_latest = Payments::latest('created_at')
                                                          ->where('user_id', $user->student_id)
                                                          ->whereNotNull('balance')
                                                          ->first();
                $this->payment_history = Payments::where('user_id', $user->student_id)
                                                   ->whereNotNull('balance')
                                                   ->get();
            } else {
                $this->isNull = true;
                $this->total = NULL;
            }
        } else {
            $this->isNull = true;
            $this->total = NULL;
        }
    }

    public function updatedPaymentOptions()
    {
        if($this->payment_options === 'by total') {
            $this->school_fee = NULL;
        } else if($this->payment_options === 'other fees') {
            $this->value = "School Fees";
            $this->others = NULL;
        } else if($this->payment_options === 'others') {
            $this->school_fee = NULL;
        } else {
            $this->school_fee = NULL;
            $this->others = NULL;
        }
    }

    public function updatedAmountPaid()
    {
        if(!empty($this->amount_paid) && $this->payment_options === 'by total') {
            if(!empty($this->payment_history_latest->balance) && $this->payment_history_latest->balance !== '0.00') {
                $this->balance = floatval($this->payment_history_latest->balance - $this->amount_paid);              
            } else {
                $this->balance = floatval($this->total - $this->amount_paid);
            }

            if($this->balance > 0){
                $this->others = "Partial Payment - Balance(Php ".number_format($this->balance, 2).")";
            } else {
                $this->others = "Full Payment (Php ".number_format($this->total, 2).")";
            }
        } else {
            $this->balance = NULL;
        }
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
            'balance' => $this->balance,
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
        return '4xl';
    }
}
