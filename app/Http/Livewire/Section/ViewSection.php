<?php

namespace App\Http\Livewire\Section;

use LivewireUI\Modal\ModalComponent;
use App\Models\Section;

class ViewSection extends ModalComponent
{
    public $section;

    protected function rules()
    {
        return [
            'section.name' => ['required'],
            'section.capacity' => ['required'],
            'section.teacher_id' => ['nullable'],
            'section.grade_level_id' => ['required'],
        ];
    }
    
    public function mount(Section $section)
    {
        $this->section = $section;
        $this->cardTitle = $section->name." Information";
    }

    public function render()
    {
        return view('livewire.section.view-section');
    }
}
