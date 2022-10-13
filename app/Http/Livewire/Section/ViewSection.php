<?php

namespace App\Http\Livewire\Section;

use LivewireUI\Modal\ModalComponent;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;

class ViewSection extends ModalComponent
{
    public $section;

    public $teacher;

    public $gradelevel;

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
        $this->section = $section;

        $this->teacher = User::find($section->teacher_id);

        $this->gradelevel = User::find($section->grade_level_id);

        // subjects of section based on pivot table
        $this->section_subjects_ids = $this->section->subjects->pluck('id')->toArray();
        
        // used as option on select
        $this->section_subjects = Subject::find($this->section_subjects_ids);

        // used as selected values
        $this->section_subjects_ids_stringified = array_map('strval', $this->section_subjects_ids);

        $this->cardTitle = $section->name." Information";
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
