<?php

namespace App\Http\Livewire\GradeLevel;

use LivewireUI\Modal\ModalComponent;
use App\Models\GradeLevel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ViewGradeLevel extends ModalComponent
{
    use AuthorizesRequests;

    public $grade_level;

    protected function rules()
    {
        return [
            'grade_level.name' => ['required'],
            'grade_level.subjects' => ['required'],

        ];
    }

    public function mount(GradeLevel $grade_level)
    {
        $this->authorize('view_grade_level');

        $this->grade_level = $grade_level;

        // $this->grade_level_subjects = $grade_level->subjects->pluck('id')->toArray();
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
