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
