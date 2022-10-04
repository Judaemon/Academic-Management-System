<?php

namespace App\Http\Livewire\Fee;

use LivewireUI\Modal\ModalComponent;
use App\Models\Fee;
use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class EditSchoolFee extends ModalComponent
{
    use Actions;

    public $school_fee;

    public function mount(Fee $school_fee)
    {
        $this->school_fee = $school_fee;
        $this->card_title = "Edit ".$school_fee->fee_name;
    }

    protected function rules()
    {
        return [
            'school_fee.fee_name' => 'required',
            'school_fee.academic_year_id' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.school_fees.edit-school-fee', [
            'academic_year' => AcademicYear::all(),
        ]);
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Edit ".$this->school_fee->fee_name." Information ?",
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
        if (!auth()->user()->can('edit_school_fee')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            $this->school_fee->forceFill([
                'fee_name' => $this->school_fee['fee_name'],
                'academic_year_id' => $this->school_fee['academic_year_id'],
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
