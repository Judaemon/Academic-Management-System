<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateGradeLevel extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade_level;

    public $name;

    protected function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;
    }

    public function render()
    {
        return view('livewire.grade-level.create-grade-level');
    }

    public function save(): void
    {
        $this->validate();

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
                'name' => $this->name,
            ]);
    
            $this->emit('refreshDatatable');
    
            $this->closeModal();

            $this->reset();
            
            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Grade Level successfully Created.'
            );
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
