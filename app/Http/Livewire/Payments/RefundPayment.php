<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\AcademicYear;
use App\Models\Payments;
use App\Models\User;
use App\Models\Setting;

use App\Notifications\PaymentNotification;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

use Auth;

class RefundPayment extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $payment;

    public $confirm_password;
    public $reason_for_refund;

    protected function rules()
    {
        return [
            'confirm_password' => ['required'],
            'reason_for_refund' => ['required'],
        ];
    }

    public function mount(Payments $payment)
    {
        $this->authorize('update_payment');

        $this->payment = $payment;
    }

    public function render()
    {
        return view('livewire.payment.refund-payment');
    }

    public function refund()
    {
        if (Hash::check($this->confirm_password, Auth::user()->password)) {
            $settings = Setting::find(1);

            $this->payment->forceFill([
                'refunder_account_id' => Auth::user()->id,
                'refund_reason' => $this->reason_for_refund,
                'payment_status' => 'Refunded',
            ])->save();
        
            if ($settings->notify_payments === 1) {
                if ($settings->notification_channel === "Email") {
                    $this->sendMail();
                } else if ($settings->notification_channel === "SMS") {
                    $this->sendMessage('Payment Refunded', '+63 976 054 2645');
                } else if ($settings->notification_channel === "Email and SMS") {
                    $this->sendMail();
                    $this->sendMessage('Payment Refunded', '+63 976 054 2645');
                }
            }
        
            $this->emit('refreshDatatable');
    
            $this->closeModal();
        
            $this->dialog()->success(
                $title = 'Success!',
                $description = 'Record is now successfully updated. Payment is Refunded.'
            );
        } else {
            $this->dialog()->error(
                $title = 'Access Denied',
                $description = "Password does not match. Please enter the password.",
            );
        }
    }

    public function sendMail()
    {
        $user = User::find($this->payment->user_id);

        if (!empty($this->payment->fee_id)) {
            $type = $this->payment->fee->fee_name;
        } else {
            $type = $this->payment->others;
        }

        $payments = [
            'name' => $this->payment->user_id,
            'accountant' => $this->payment->accountant_id,
            'amount_paid' => $this->payment->amount_paid,
            'payment_type' => $type,
            'method' => $this->payment->payment_method,
            'balance' => $this->payment->balance,
            'academic_year' => $this->payment->academic_year_id,
            'status' => $this->payment->payment_status,
        ];

        $message = "We would like to inform you that your request for a refund for your payment in <b>" . $type . "</b> with the amount of <b> Php " . number_format($this->payment->amount_paid, 2) . "</b> is now being processed.";

        Notification::sendNow($user, new PaymentNotification($payments, $message));
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
}
