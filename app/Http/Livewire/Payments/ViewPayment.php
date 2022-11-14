<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Payments;
use App\Models\Admission;
use App\Models\Fee;

class ViewPayment extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $payment;

    public $total;
    public $school_fees;
    public $payment_history;

    public function mount(Payments $payment)
    {
        $this->authorize('read_payment');

        $this->payment = $payment;

        $user = Admission::where('student_id', $this->payment->user_id)->first();

        if(!empty($user)) {
            $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)
                                      ->get();
            $this->total = $this->school_fees->sum('amount');

            $this->payment_history = Payments::where('user_id', $user->student_id)
                                               ->where('created_at', '<=', $payment->created_at)
                                               ->whereNotNull('balance')
                                               ->get();
        } else {
            $this->total = NULL;
            $this->school_fees = NULL;
            $this->payment_history = NULL;
        }
    }

    public function render()
    {
        return view('livewire.payment.view-payment');
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
