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

    public $teacher;
    public $teachers;

    public $grade_level;
    public $grade_levels;

    public $section_subjects = [];
    public $subjects;

    protected function rules()
    {
        return [
            'section.name' => ['required'],
            'section.capacity' => ['required'],
            
            'teacher' => ['required', new Teacher],
            
            'grade_level' => ['required'],
            
            'section_subjects' => ['required'],
        ];
    }

    public function mount(Section $section)
    {
        $this->section = $section;

        $this->teachers = User::role('Teacher')->get();

        $this->grade_levels = GradeLevel::all();
        
        $this->subjects = Subject::all();

        // converted to string because option value are string
        // if removed the teacher id is int and will not be selected 
        $this->teacher = (string)$section->teacher_id;
        
        $this->grade_level = (string)$section->grade_level_id;

        // subjects of section based on pivot table
        $section_subjects = $section->subjects->pluck('id')->toArray();

        // used as selected values
        $this->section_subjects = array_map('strval', $section_subjects);
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

        $this->authorize('update_section');
        
        // passing the changes value to section if not the changes will not be saved 
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
