<?php

namespace App\Http\Livewire\Fee;

use Livewire\Component;
use App\Models\Fee;
use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class CreateSchoolFee extends Component
{
    public $modalCreate;
    public $school_fee;

    use Actions;

    public function render()
    {
        return view('livewire.fee.create-school-fee', [
            'academic_year' => AcademicYear::all(),
        ]);
    }

    protected function rules()
    {
        return [
            'school_fee.fee_name' => 'required',
            'school_fee.academic_year_id' => 'required'
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
        if (!auth()->user()->can('create_user')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            Fee::create([
                'fee_name' => $this->school_fee['fee_name'],
                'academic_year_id' => $this->school_fee['academic_year_id'],
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
