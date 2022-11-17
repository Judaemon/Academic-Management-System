<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Payments;
use App\Models\Admission;
use App\Models\Fee;
use App\Models\User;
use App\Models\Setting;

use App\Notifications\PaymentNotification;
use Auth;

class ViewPayment extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $payment;

    public $total;
    public $status;

    public $school_fees;
    public $history;

    public function mount(Payments $payment)
    {
        $this->authorize('read_payment');

        $this->payment = $payment;
        $this->status =  $payment->payment_status;

        $user = Admission::where('student_id', $this->payment->user_id)->latest()->first();

        if(!empty($user)) {
            $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
            $this->total = $this->school_fees->sum('amount');

            $this->history = Payments::where('user_id', $user->student_id)
                                       ->where('payment_status', 'Paid')
                                       ->where('created_at', '<=', $payment->created_at)
                                       ->whereHas('academic_year', function($query) {
                                            $query->where('status', "Ongoing");
                                        })
                                       ->whereNotNull('balance')
                                       ->get();
        } else {
            $this->total = NULL;
            $this->school_fees = NULL;
            $this->history = NULL;
        }
    }

    public function render()
    {
        return view('livewire.payment.view-payment');
    }

    public function confirmPayment()
    {
        if($this->authorize('update_payment')) {
            $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => "This payment will be confirmed",
                'icon'        => 'warning',
                'accept'      => [
                    'label'  => 'Yes, confirm',
                    'method' => 'update',
                    'params' => 'Updated',
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                    'method' => '',
                ],
            ]);
        } else {
            $this->dialog()->error(
                $title = 'Access Denied',
                $description = "Current user does not have the permission to update the record",
            );
        }
    }

    public function update()
    {
        $settings = Setting::find(1);

        $this->payment->forceFill([
            'payment_status' => "Paid",
            'accountant_id' => Auth::user()->id,
        ])->save();

        if($settings->notification_channel === "Email") {
            $this->sendMail();
        } else if($settings->notification_channel === "SMS") {
            $this->sendMessage('Payment Refunded', '+63 976 054 2645');
        } else if($settings->notification_channel === "Email and SMS") {
            $this->sendMail();
            $this->sendMessage('Payment Refunded', '+63 976 054 2645');
        }

        $this->emit('refreshDatatable');

        $this->closeModal();
    
        $this->dialog()->success(
            $title = 'Success!',
            $description = 'Record is now successfully updated. Payment is Now Confirmed.'
        );
    }

    public function sendMail()
    {
        $user = User::find($this->payment->user_id);

        if(!empty($this->payment->fee_id)) {
            $type = $this->payment->fee->fee_name;
        } else {
            $type = $this->payment->others;
        }

        $payment = [
            'name' => $this->payment->user_id,
            'accountant' => Auth::user()->id,
            'amount_paid' => $this->payment->amount_paid,
            'fee' => $this->payment->fee_id,
            'method' => $this->payment->payment_method,
            'balance' => $this->payment->balance,
            'academic_year' => $this->payment->academic_year_id,
            'status' => $this->payment->payment_status,
        ];

        $message = "We would to inform you that your payment for <b>".$type."</b> with the amount of <b> Php ".$this->payment->amount_paid."</b> has now been confirmed.";

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

    public function download()
    {
        dd("Show a preview.Before Downloading.");
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
