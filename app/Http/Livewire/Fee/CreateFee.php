<?php

namespace App\Http\Livewire\Fee;

use Livewire\Component;
use App\Models\Fee;
use WireUi\Traits\Actions;

class CreateFee extends Component
{
    use Actions;

    public $modalCreate;
    public 
      $fee_name, 
      $amount,
      $grade_level_id;

    public function render()
    {
        return view('livewire.fee.create-fee');
    }

    protected function rules()
    {
        return [
            'fee_name' => 'required|min:5|max:35',
            'amount' => 'required|numeric',
            // 'fee.grade_level_id' => 'required'
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

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
        if (!auth()->user()->can('create_fee')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            Fee::create([
                'fee_name' => $this->fee_name,
                'amount' => $this->amount,
                // 'grade_level_id' => $this->fee['grade_level_id'],
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
