<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use App\Models\AcademicYear;

class ViewAcademicLevel extends ModalComponent
{
    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
        $this->academic_year = $academic_year;
    }

    public function render()
    {
        return view('livewire.academic-year.view-academic-level');
    }
}
