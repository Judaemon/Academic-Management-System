<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\AcademicYear;

class ViewAcademicYear extends ModalComponent
{
    use AuthorizesRequests;

    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
        $this->authorize('view_academic_year');
        $this->academic_year = $academic_year;

        $this->title = $academic_year->title;
        $this->status = $academic_year->status;

        $this->start_date = $academic_year->start_date;
        $this->school_days = $academic_year->school_days;
        $this->end_date = $academic_year->end_date;
    }

    public function render()
    {
        return view('livewire.academic-year.view-academic-year');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
