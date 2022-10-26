<?php

namespace App\Http\Livewire\Admission;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;

use Carbon\Carbon;

class EditAdmission extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $admission;

    public $status;
    public $enrolled_by;
    public $date_enrolled;
    public $section_id;
    public $student_id;

    public function mount(Admission $admission)
    {
        $this->admission = $admission;

        $this->status = $admission->status;
        $this->enrolled_by = $admission->enrolled_by;
        $this->date_enrolled = $admission->date_enrolled;
        $this->section_id = $admission->section_id;
        $this->student_id = $admission->student_id;
    }

    protected function rules()
    {
        return [
            'status' => ['required'],
            'enrolled_by' => ['required'],
            'date_enrolled' => ['required', 'date'],
            'section_id' => ['required'],
            'student_id' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.admission.edit-admission');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        //$this->authorize('update_admission');
        
        $this->admission->forceFill([
            'status' => $this->status,
            'enrolled_by' => $this->enrolled_by,
            'date_enrolled' => Carbon::parse($this->date_enrolled)->toDateString(),
            'section_id' => $this->section_id,
            'student_id' => $this->student_id,
        ])->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Admission information successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
