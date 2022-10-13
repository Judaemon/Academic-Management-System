<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use App\Models\GradeLevel;
use App\Rules\Teacher;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateSection extends Component
{
    use Actions;

    public $modalCreate;

    public $section;

    public $subjects;
    public $addSubject = [];

    public $teachers;
    public $teacher;

    public $gradelevels;
    public $gradelevel;

    protected function rules()
    {
        return [
            'section.name' => ['required'],
            'section.capacity' => ['required'],

            'teacher' => ['required', new Teacher],
            'section.grade_level_id' => ['required'],
        ];
    }

    public function render()
    {
        // search based on section.grade_level_id
        $this->subjects = Subject::all();
        
        $this->teachers = User::role('Teacher')->get();

        $this->gradelevels = GradeLevel::all();

        return view('livewire.section.create-section');
    }

    public function save(): void
    {
        $this->validate();

        $this->modalCreate = false;

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
        $section = Section::create([
            'name' => $this->section['name'],
            'capacity' => $this->section['capacity'],
            'teacher_id' => $this->teacher,
            'grade_level_id' => $this->section['name'],
        ]);

        $section->subjects()->attach($this->addSubject);

        $this->emit('refreshDatatable');

        $this->reset();
        
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Section successfully Created.'
        );
    }

    public function close()
    {
        $this->modalCreate = false;
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
