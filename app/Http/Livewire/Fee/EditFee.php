<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Fee;
use App\Models\AcademicYear;

class EditFee extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $fee;

    public $fee_name;
    public $amount;
    public $academic_year_id;

    public function mount(Fee $fee)
    {
        $this->fee = $fee;

        $this->fee_name = $fee->fee_name;
        $this->amount = $fee->amount;
        $this->academic_year_id = $fee->academic_year_id;
    }

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
        return view('livewire.fee.edit-fee', [
            'academic_years' => AcademicYear::all(),
        ]);
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Edit ".$this->fee->fee_name." Information ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('edit_fee');

        $this->fee->forceFill([
            'fee_name' => $this->fee_name,
            'amount' => $this->amount,
            'academic_year_id' => $this->academic_year_id,
        ])->save();
    
        $this->emit('refreshDatatable');

        $this->closeModal();
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = $this->fee_name.' successfully Updated.'
        );
    }
}
