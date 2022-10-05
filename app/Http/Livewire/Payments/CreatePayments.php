<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use App\Models\User;
use App\Models\Payments;
use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class CreatePayments extends Component
{
    public $modalCreate;
    public $payment;

    use Actions;

    public function render()
    {
        return view('livewire.payments.create-payments', [
            'academic_year' => AcademicYear::all(),
            'users' => User::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'payment.user_id' => 'required',
            'payment.payment_value' => 'required',
            'payment.academic_year_id' => 'required'
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create Payment?',
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
        if (!auth()->user()->can('create_user')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            Payments::create([
                'user_id' => $this->payment['user_id'],
                'payment_value' => $this->payment['payment_value'],
                'academic_year_id' => $this->payment['academic_year_id'],
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'School Fee successfully Created.'
            );
        }
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
