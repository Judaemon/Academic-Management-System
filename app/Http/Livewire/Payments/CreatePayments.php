<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;
use App\Models\Payments;
use App\Models\User;
use App\Models\Fee;
use App\Models\Setting;
use App\Notifications\PaymentNotification;

use Auth;
use Carbon\Carbon;

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
            $user = Admission::where('student_id', $this->name)->latest()->first();
            
            if(!empty($user)) {
                $this->isNull = false;
                $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
                $this->total = $this->school_fees->sum('amount');

                $this->latest = Payments::where('payment_status', 'Paid')
                                          ->where('user_id', $user->student_id)
                                          ->latest()
                                          ->whereHas('academic_year', function($query) {
                                                $query->where('status', "Ongoing");
                                            })
                                          ->whereNotNull('balance')
                                          ->first();

                $this->history = Payments::where('user_id', $user->student_id)
                                           ->where('payment_status', 'Paid')
                                           ->whereNotNull('balance')
                                           ->whereHas('academic_year', function($query) {
                                                $query->where('status', "Ongoing");
                                            })
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
        $settings = Setting::find(1);
        
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

        if($settings->notification_channel === "Email") {
            $this->sendMail();
        } else if($settings->notification_channel === "SMS") {
            $this->sendMessage('Payment Confirmed', '+63 976 054 2645');
        } else if($settings->notification_channel === "Email and SMS") {
            $this->sendMail();
            $this->sendMessage('Payment Confirmed', '+63 976 054 2645');
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

        if(!empty($this->fee_id)) {
            $type = Fee::select('fee_name')->where('id', $this->fee_id)->first();
        } else {
            $type = $this->others;
        }

        $payment = [
            'name' => $this->name,
            'accountant' => Auth::user()->id,
            'amount_paid' => $this->amount_paid,
            'payment_type' => $type,
            'method' => $this->method,
            'balance' => $this->balance,
            'academic_year' => $this->academic_year,
            'status' => $this->status,
        ];

        $message = "We would like to inform you that your payment for <b>".$type."</b> has been processed this <b>".Carbon::today()->format('F j\, Y')."</b>.";

        Notification::sendNow($user, new PaymentNotification($payment, $message));
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
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
