<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditGradeLevel extends ModalComponent
{
    use Actions;

    public $grade_level;

    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;
        $this->card_title = "Editing Grade Level";
    }

    protected function rules()
    {
        return [
            'grade_level.name' => ['required'],
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
        if (!auth()->user()->can('edit_grade_level')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            $this->grade_level->save();

            $this->emit('refreshDatatable');

            $this->closeModal();

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Grade Level information successfully Updated.'
            );
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
