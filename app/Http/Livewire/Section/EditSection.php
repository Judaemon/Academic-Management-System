<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use App\Models\GradeLevel;
use App\Rules\Teacher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditSection extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $section;

    public $grade_level;

    public $grade_level_subjects = [];

    protected function rules()
    {
        return [
            'section.name' => ['required', 'unique:sections,name,' . $this->section->id],
            'section.capacity' => ['required'],
            'section.teacher_id' => ['required', new Teacher, 'unique:sections,teacher_id,' . $this->section->id],

            'grade_level' => ['required'],
        ];
    }

    protected function messages()
    {
        return [
            'section.teacher_id.unique' => "The selected teacher is already assigned to a class."
        ];
    }

    public function mount(Section $section)
    {
        $this->section = $section;

        $this->grade_level = $section->grade_level_id;
        $this->grade_level_subjects = GradeLevel::query()
            ->find($section->grade_level_id)
            ->subjects;
    }

    public function render()
    {
        return view('livewire.section.edit-section');
    }

    public function updatedGradeLevel($value)
    {
        if (!empty($value)) {
            $this->grade_level_subjects = GradeLevel::find($value)->subjects;
        } else {
            $this->grade_level_subjects = [];
        }
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
        $this->authorize('update_section');

        // passing the changes value to section if not the changes will not be saved
        $this->section->grade_level_id = $this->grade_level;

        $this->section->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section information successfully saved.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
