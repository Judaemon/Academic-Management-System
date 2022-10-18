<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\AcademicYear;

use Carbon\Carbon;

class EditAcademicYear extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $academic_year;

    public $start_date;
    public $school_days = 0;
    public $end_date;

    public function mount(AcademicYear $academic_year)
    {
        $this->academic_year = $academic_year;

        $this->card_title = "Editing Academic Year";

        $this->start_date = $academic_year->start_date;
        $this->school_days = $academic_year->school_days;
        $this->end_date = $academic_year->end_date;
    }

    protected function rules()
    {
        return [
            'start_date' => ['required', 'date'],
            'school_days' => ['nullable', 'numeric'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
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
        $this->authorize('update_academic_year');

        // find ways to display during input
        if($this->school_days > 0) {
            $this->end_date = Carbon::parse($this->start_date)->addDays($this->school_days);
        } else {
            $this->end_date = NULL;
        }
        
        $this->academic_year->forceFill([
            'start_date' => $this->start_date,
            'school_days' => $this->school_days,
            'end_date' => $this->end_date,
        ])->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Academic information successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
