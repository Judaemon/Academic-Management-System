<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditGradeLevel extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade_level;

    public $grade_level_subjects = [];

    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;

        $this->grade_level_subjects = $grade_level->subjects->pluck('id')->toArray();
    }

    protected function rules()
    {
        return [
            'grade_level.name' => ['required'],
            'grade_level_subjects' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.grade-level.edit-grade-level');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('update_grade_level');

        $this->grade_level->save();

        $this->grade_level->subjects()->sync($this->grade_level_subjects);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grade Level information successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
