<?php

namespace App\Http\Livewire\GradeLevel;

use LivewireUI\Modal\ModalComponent;
use App\Models\GradeLevel;

class ViewGradeLevel extends ModalComponent
{
    public $grade_level;

    protected function rules()
    {
        return [
            'grade_level.name' => ['required'],
        ];
    }
    
    public function mount(GradeLevel $grade_level)
    {
        $this->grade_level = $grade_level;
    }

    public function render()
    {
        return view('livewire.grade-level.view-grade-level');
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
