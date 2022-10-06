<?php

namespace App\Http\Livewire\Fee;

use Livewire\Component;
use App\Models\Fee;
use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class CreateFee extends Component
{
    public $modalCreate;
    public $fee;

    use Actions;

    public function render()
    {
        return view('livewire.fee.create-fee', [
            'academic_year' => AcademicYear::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'fee.fee_name' => 'required',
            'fee.academic_year_id' => 'required'
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
        }else{
            Fee::create([
                'fee_name' => $this->fee['fee_name'],
                'academic_year_id' => $this->fee['academic_year_id'],
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
