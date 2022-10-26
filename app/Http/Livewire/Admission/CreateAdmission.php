<?php

namespace App\Http\Livewire\Admission;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;

class CreateAdmission extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $status;
    public $enrolled_by;
    public $date_enrolled;
    public $section_id;
    public $student_id;

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
        return view('livewire.admission.create-admission');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create Admission?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        //$this->authorize('create_admission');

        Admission::create([
            'status' => $this->status,
            'enrolled_by' => $this->enrolled_by,
            'date_enrolled' => Carbon::parse($this->date_enrolled)->toDateString(),
            'section_id' => $this->section_id,
            'student_id' => $this->student_id,
        ]);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Admission successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
