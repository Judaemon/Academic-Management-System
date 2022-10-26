<?php

namespace App\Http\Livewire\GradeLevel;

use App\Models\GradeLevel;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditGradeLevel extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade_level;

    public $grade_level_subjects_old = [];
    public $grade_level_subjects = [];

    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;

        $grade_level_subject_ids = $grade_level->subjects->pluck('id')->toArray();

        $this->grade_level_subjects_old = $grade_level_subject_ids;
        $this->grade_level_subjects = $grade_level_subject_ids;
    }

    protected function rules()
    {
        return [
            'grade_level.name' => ['required', 'unique:grade_levels,name,' . $this->grade_level->id],
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

        // dd($removed_subjects, $this->grade_level_subjects);

        $this->authorize('update_grade_level');

        $this->grade_level->save();

        // removed
        $removed_subjects = array_diff($this->grade_level_subjects_old, $this->grade_level_subjects);

        Subject::query()
            ->whereIn('id', $removed_subjects)
            ->update(['grade_level_id' => null]);

        // update selected subjects
        Subject::query()
            ->whereIn('id', $this->grade_level_subjects)
            ->update(['grade_level_id' => $this->grade_level->id]);

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
