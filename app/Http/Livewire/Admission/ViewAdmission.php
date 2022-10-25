<?php

namespace App\Http\Livewire\Admission;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;

class ViewAdmission extends ModalComponent
{
    use AuthorizesRequests;

    public $admission;
   
    public function mount(Admission $admission)
    {
        $this->authorize('view_admission');

        $this->admission = $admission;

        $this->status = $admission->status;
        $this->enrolled_by = $admission->enrolled_by;
        $this->date_enrolled = $admission->date_enrolled;
        $this->section_id = $admission->section_id;
        $this->student_id = $admission->student_id;
    }

    public function render()
    {
        return view('livewire.admission.view-admission');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
