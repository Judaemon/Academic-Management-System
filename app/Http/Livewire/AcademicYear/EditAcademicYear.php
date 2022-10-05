<?php

namespace App\Http\Livewire\AcademicYear;

use App\Models\AcademicYear;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditAcademicYear extends ModalComponent
{
    use Actions;

    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
        $this->academic_year = $academic_year;
        $this->card_title = "Editing Academic Year";
    }

    protected function rules()
    {
        return [
            'academic_year.start_year' => ['required', 'date', 'before:academic_year.end_year'],
            'academic_year.end_year' => ['required', 'date', 'after:academic_year.start_year'],
            'academic_year.curriculum' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.academic-year.edit-academic-year');
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
        if (!auth()->user()->can('edit_academic_year')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        } else {
            $this->academic_year->save();

            $this->emit('refreshDatatable');

            $this->closeModal();

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'Academic information successfully Updated.'
            );
        }
    }
}
