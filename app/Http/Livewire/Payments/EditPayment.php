<?php

namespace App\Http\Livewire\Payments;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Models\Payments;
use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class EditPayment extends ModalComponent
{
    public $payment;

    use Actions;

    public function mount(Payments $payment)
    {
        $this->payment = $payment;
        $this->card_title = "Edit Payment";
    }

    protected function rules()
    {
        return [
            'payment.user_id' => 'required',
            'payment.payment_value' => 'required',
            'payment.academic_year_id' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.payments.edit-payment', [
            'academic_year' => AcademicYear::all(),
            'users' => User::all(),
        ]);
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Edit This User's Payment Information ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
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
        if (!auth()->user()->can('edit_payment')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            $this->payment->forceFill([
                'user_id' => $this->payment['user_id'],
                'payment_value' => $this->payment['payment_value'],
                'academic_year_id' => $this->payment['academic_year_id'],
            ])->save();
    
            $this->emit('refreshDatatable');
    
            $this->closeModal();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'School Fee successfully Updated.'
            );
        }
    }
}
