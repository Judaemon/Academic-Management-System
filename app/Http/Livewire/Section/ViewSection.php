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

    public $grade_level;

    public $section_students;

    public $grade_level_subjects = [];

    protected function rules()
    {
        return [
            'section.name' => ['required', 'unique:sections,name'],
            'section.capacity' => ['required'],

            'section.teacher_id' => ['required'],
            'section.grade_level_id' => ['required'],
        ];
    }

    public function mount(Section $section)
    {
        $this->authorize('view_section');

        $this->section = $section;

        $this->grade_level_subjects = GradeLevel::query()
            ->find($section->grade_level_id)
            ->subjects;

        $this->section_students = User::query()
            ->whereHas('admission', function ($q) {
                $q->where('academic_year_id', setting('academic_year_id'));
                $q->whereHas('section', function ($q) {
                    $q->where('id', $this->section->id);
                });
            })
            ->get();
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
