<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Section;
use App\Models\Subject;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SectionInformation extends Component
{
    public function mount()
    {
        $this->section = Section::query()
            ->where('teacher_id', Auth::id())
            ->whereHas('admission', function ($q) {
                $q->where('academic_year_id', setting('academic_year_id'));
            })
            ->first();

        $this->section_subjects = Subject::query()
            ->where('grade_level_id', $this->section->grade_level_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.teacher.section-information');
    }
}
