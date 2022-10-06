<?php

namespace App\Http\Livewire\Fee;

use App\Models\AcademicYear;
use App\Models\Fee;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditFee extends ModalComponent
{
    use Actions;

    public 
      $fee,
      $fee_name, 
      $cost,
      $grade_level_id;

    public function mount(Fee $fee)
    {
        $this->fee = $fee;
        $this->fee_name = $fee->fee_name;
        $this->cost = $fee->cost;
        $this->card_title = "Edit ".$fee->fee_name;
    }

    protected function rules()
    {
        return [
            'fee_name' => 'required|min:5',
            'cost' => 'required',
            // 'fee.grade_level_id' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.fee.edit-fee');
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
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        if (!auth()->user()->can('edit_fee')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            $this->fee->forceFill([
                'fee_name' => $this->fee_name,
                'cost' => $this->cost,
                // 'grade_level_id' => $this->fee['grade_level_id'],
            ])->save();
    
            $this->emit('refreshDatatable');
    
            $this->closeModal();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = $this->fee_name.' successfully Updated.'
            );
        }
    }
}
