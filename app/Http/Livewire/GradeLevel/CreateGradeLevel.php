<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateGradeLevel extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;

    public $subjects = [];

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:grade_levels,name'],
            'subjects' => ['required'],
        ];
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
            'description' => 'Create this grade level?',
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

        $grade_level = GradeLevel::create([
            'name' => $this->name,
        ]);

        // Updates the grade_level_id of selected subjects to the new grade level
        Subject::query()
            ->whereIn('id', $this->subjects)
            ->update(['grade_level_id' => $grade_level->id]);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->reset();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grade Level successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
