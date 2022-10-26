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

class CreateSection extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $name;
    public $capacity;

    public $teacher;

    public $grade_level;
    public $grade_level_subjects = [];

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:sections,name'],
            'capacity' => ['required', 'numeric', 'min:0', 'max:60'],

            'teacher' => ['required', new Teacher],

            'grade_level' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.section.create-section');
    }

    public function updatedGradeLevel($value)
    {
        if (!empty($value)) {
            $this->grade_level_subjects = GradeLevel::find($value)->subjects;
        }
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the section?',
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
        $this->authorize('create_section');

        Section::create([
            'name' => $this->name,
            'capacity' => $this->capacity,
            'teacher_id' => $this->teacher,
            'grade_level_id' => $this->grade_level,
        ]);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section successfully created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
