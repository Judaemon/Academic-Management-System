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
    public $school_fee;
    public $payment_method;
    public $others;

    public $total;
    public $total_options;
    public $payment_options;

    public $isNull = true;

    public $grade_level;
    public $school_fees;
    public $past_total_payments;

    public $value = "default";

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
            $user = Admission::where('student_id', $this->name)->first();
            
            if($user != NULL) {
                $this->isNull = false;
                $this->grade_level = $user->admit_to_grade_level;
                $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
                $this->total = $this->school_fees->sum('amount');
            } else {
                $this->isNull = true;
                $this->grade_level = NULL;
                $this->total = NULL;
                $this->school_fees = Fee::where('grade_level_id', '=', NULL)->get();
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
            $this->others = "Grand Total (Php ".$this->total.")";
        } else if($this->payment_options === 'per fee') {
            $this->value = "School Fees";
            $this->others = NULL;
        } else if($this->payment_options === 'others') {
            $this->school_fee = NULL;
        } else {
            $this->school_fee = NULL;
            $this->others = NULL;
        }
    }

    public function updatedTotalOptions()
    {
        if($this->total_options === 'Full Payment') {
            $this->school_fee = NULL;
            $this->others = "Total (Php ".$this->total.")";
        } else if($this->total_options === 'Partial Payment') {
            $this->others = "Remaining Total (Php ".$this->total.")";
            $this->school_fee = NULL;
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
