<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Fee;
use App\Models\AcademicYear;

class CreateFee extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $fee_name;
    public $amount;
    public $academic_year_id;

    protected function rules()
    {
        return [
            'fee_name' => ['required', 'min:5', 'max:35'],
            'amount' => ['required', 'numeric'],
            'academic_year_id' => ['nullable', 'unique:academic_years,id,'.$this->academic_year_id],
        ];
    }

    public function render()
    {
        return view('livewire.fee.create-fee', [
            'academic_years' => AcademicYear::all(),
        ]);
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
             'title'       => 'Are you Sure?',
            'description' => 'Create School Fee?',
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
        $this->authorize('create_fee');
            
        Fee::create([
            'fee_name' => $this->fee_name,
            'amount' => $this->amount,
            'academic_year_id' => $this->academic_year_id,
        ]);
    
        $this->emit('refreshDatatable');
    
        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'School Fee successfully Created.'
        );
    }

}