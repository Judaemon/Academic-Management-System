<?php

namespace App\Http\Livewire\Fee;

use Livewire\Component;
use WireUi\Traits\Actions;

use App\Models\Fee;
use App\Models\AcademicYear;

class CreateFee extends Component
{
    use Actions;

    public $modalCreate;
    public 
      $fee_name, 
      $amount,
      $academic_year_id,
      $grade_level_id;

    public function render()
    {
        return view('livewire.fee.create-fee', [
            'academic_years' => AcademicYear::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'fee_name' => 'required|min:5|max:35',
            'amount' => 'required|numeric',
            'academic_year_id' => 'nullable|unique:academic_years,id,'.$this->academic_year_id,
            // 'grade_level_id' => 'required'
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
                'academic_year_id' => $this->academic_year_id,
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
