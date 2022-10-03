<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use App\Models\AcademicYear;

class EditAcademicYear extends ModalComponent
{
    public $academic_year;

    public function mount(AcademicYear $academic_year)
    {
        $this->academic_year = $academic_year;
    }

    protected function rules()
    {
        return [
            'academic_year.year' => ['required'],
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

        $this->modalReadUpdateDelete = false;

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
        if (!auth()->user()->can('update_academic_year')) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'You do not have permission for this action.'
            );
        }else{
            $this->user->save();

            $this->emit('refreshDatatable');

            $this->closeModal();

            $this->dialog()->success(
                $title = 'Successful!',
                $description = 'User information successfully Updated.'
            );
        }
    }
}
