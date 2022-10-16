<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use App\Models\AcademicYear;

class ViewAcademicYear extends ModalComponent
{
    public $academic_year;

    protected function rules()
    {
        return [
            'academic_year.start_year' => ['required', 'date', 'before:academic_year.end_year'],
            'academic_year.end_year' => ['required', 'date', 'after:academic_year.start_year'],
            'academic_year.curriculum' => ['required'],
        ];
    }
    
    public function mount(AcademicYear $academic_year)
    {
        $this->academic_year = $academic_year;
    }

    public function render()
    {
        return view('livewire.academic-year.view-academic-year');
    }
}
