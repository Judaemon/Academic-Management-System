<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use App\Models\GradeLevel;
use App\Rules\Teacher;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditSection extends ModalComponent
{
    use Actions;

    public $modalReadUpdateDelete;

    public $section;

    public $teachers;
    public $teacher;

    public $section_subjects = [];

    public $gradelevels;
    public $gradelevel;

    protected function rules()
    {
        return [
            'section.name' => ['required'],
            'section.capacity' => ['required'],

            'section.teacher_id' => ['required'],

            'teacher' => ['required', new Teacher],
            'section.grade_level_id' => ['required'],
        ];
    }

    public function mount(Section $section)
    {
        // search based on section.grade_level_id
        $this->gradelevels = GradeLevel::all();
        
        // used as option on select
        $this->subjects = Subject::all();

        // used as option on select
        $this->teachers = User::role('Teacher')->get();

        $this->section = $section;

        // converted to string because option value are string
        // if removed the teacher id is int and will not be selected 
        $this->teacher = (string)$section->teacher_id;

        // subjects of section based on pivot table
        $this->section_subjects = $this->section->subjects->pluck('id')->toArray();

        // used as selected values
        $this->section_subjects = array_map('strval', $this->section_subjects);

        $this->cardTitle = $section->name." Information";
    }

    public function render()
    {
        return view('livewire.section.edit-section');
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
        
        $this->section->teacher_id = $this->teacher;
        $this->section->grade_level_id = $this->grade_level;
        
        $this->section->save();

        $this->section->subjects()->sync($this->section_subjects);

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
