<?php

namespace App\Http\Livewire\AcademicYear;

use Livewire\Component;

use App\Models\AcademicYear;
use WireUi\Traits\Actions;

class CreateAcademicYear extends Component
{
    use Actions;

    public $modalCreate;

    public $academic_year;

    protected function rules()
    {
        return [
            'academic_year.year' => ['required'],
            'academic_year.curriculum' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.academic-year.create-academic-year');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create Academic Year Level?',
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
            AcademicYear::create([
                'year' => $this->academic_year['year'],
                'curriculum' => $this->academic_year['curriculum'],
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Academic Year successfully Created.'
            );
        }
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
