<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;
use App\Models\Payments;
use App\Models\User;
use App\Models\Fee;
use App\Notifications\PaymentNotification;

use Auth;

class CreatePayments extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;
    public $academic_year;
    public $amount_paid;
    public $method;
    public $balance;
    public $school_fee;
    public $others;
    public $status;

    public $total;
    public $options;
    public $latest;

    public $isNull = true;

    public $school_fees;
    public $history;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:users,id,'.$this->name],
            'academic_year' => ['required', 'unique:academic_years,id,'.$this->academic_year],
            'amount_paid' => ['required', 'numeric'],
            'school_fee' => ['nullable', 'unique:fees,id,'.$this->school_fee],
            'balance' => ['nullable', 'numeric'],
            'method' => ['required'],
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

                $this->latest = Payments::latest('created_at')
                                          ->where('user_id', $user->student_id)
                                          ->whereNotNull('balance')
                                          ->first();
                $this->history = Payments::where('user_id', $user->student_id)
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

    public function updatedOptions()
    {
        if($this->options === 'total fee') {
            $this->school_fee = NULL;
        } else if($this->options === 'other fees') {
            $this->others = NULL;
        } else if($this->options === 'others') {
            $this->school_fee = NULL;
        } else {
            $this->school_fee = NULL;
            $this->others = NULL;
        }
    }

    public function updatedAmountPaid()
    {
        if(!empty($this->amount_paid) && $this->options === 'total fee') {
            if(!empty($this->latest->balance) && $this->latest->balance !== '0.00') {
                $this->balance = floatval($this->latest->balance - $this->amount_paid);              
            } else {
                $this->balance = floatval($this->total - $this->amount_paid);
            }

            if($this->balance > 0){
                $this->others = "Total Fee - Partial Payment";
            } else {
                $this->others = "Total Fee - Full Payment";
            }
        } else {
            $this->balance = NULL;
        }
    }

    public function updatedMethod()
    {
        if(!empty($this->method)) {
            if($this->method === 'Over the Counter') {
                $this->status = "Paid";
            } else {
                $this->status = "Pending";
            }
        } else {
            $this->status = NULL;
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
            'payment_method' => $this->method,
            'balance' => $this->balance,
            'others' => $this->others,
            'academic_year_id' => $this->academic_year,
            'payment_status' => $this->status,
        ]);

        if($this->status === 'Paid') {
            $this->sendMail();
        }
    
        $this->emit('refreshDatatable');

        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Payment has been Recorded.'
        );
    }

    public function sendMail()
    {
        $user = User::find($this->name);
        $payment = [
            'name' => $this->name,
            'accountant' => Auth::user()->id,
            'amount_paid' => $this->amount_paid,
            'fee' => $this->school_fee,
            'method' => $this->method,
            'balance' => $this->balance,
            'academic_year' => $this->academic_year,
            'status' => $this->status,
        ];

        Notification::sendNow($user, new PaymentNotification($payment));
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
