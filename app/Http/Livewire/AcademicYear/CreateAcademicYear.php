<?php

namespace App\Http\Livewire\AcademicYear;

use App\Models\AcademicYear;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateAcademicYear extends Component
{
    use Actions;

    public $modalCreate;

    public $academic_year;

    public function mount()
    {
        $this->academic_year['start_year'] = null;
        $this->academic_year['end_year'] = null;
    }

    // https://laravel-livewire.com/docs/2.x/input-validation
    // error messaged should be changed
    protected function rules()
    {
        return [
            'academic_year.start_year' => ['required', 'date', 'before:academic_year.end_year'],
            'academic_year.end_year' => ['required', 'date', 'after:academic_year.start_year'],
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
        if (!auth()->user()->can('create_academic_year')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            AcademicYear::create([
                'start_year' => $this->academic_year['start_year'],
                'end_year' => $this->academic_year['end_year'],
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
