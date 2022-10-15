<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateGradeLevel extends Component
{
    use AuthorizesRequests, Actions;

    public $modalCreate;

    public $grade_level;

    public function mount()
    {
        $this->grade_level['name'] = null;
    }

    // https://laravel-livewire.com/docs/2.x/input-validation
    // error messaged should be changed
    protected function rules()
    {
        return [
            'grade_level.name' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.grade-level.create-grade-level');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create Grade Level?',
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
        $this->authorize('create_grade_level');

        if (!auth()->user()->can('create_grade_level')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            GradeLevel::create([
                'name' => $this->grade_level['name'],
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Grade Level successfully Created.'
            );
        }
    }

    public function closeModal()
    {
        $this->modalCreate = false;
    }
}
