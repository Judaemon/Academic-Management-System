<?php

namespace App\Http\Livewire\Section;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ViewSection extends ModalComponent
{
    use AuthorizesRequests;

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

            'section.teacher_id' => ['required'],
            'section.grade_level_id' => ['required'],

            'teacher.firstname' => ['required'],
            'teacher.lastname' => ['required'],
        ];
    }
    
    public function mount(Section $section)
    {
        $this->authorize('view_section');

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
        return view('livewire.section.view-section');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
