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

        $this->title = $academic_year->title;
        $this->status = $academic_year->status;

        $this->start_date = $academic_year->start_date;
        $this->school_days = $academic_year->school_days;
        $this->end_date = $academic_year->end_date;
    }

    protected function rules()
    {
        return [
            'title' => ['required'],
            'status' => ['required'],

            'start_date' => ['required', 'date'],
            'school_days' => ['nullable', 'numeric'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
        ];
    }

    public function render()
    {
        return view('livewire.academic-year.edit-academic-year');
    }

    public function updatedEndDate()
    {
        if ($this->end_date != NULL) {
            $this->school_days = Carbon::parse($this->start_date)->diffInDays($this->end_date);
        } else {
            $this->school_days = 0;
        }
    }

    public function updatedSchoolDays()
    {
        if ($this->school_days > 0) {
            $this->end_date = Carbon::parse($this->start_date)->addDays($this->school_days);
        } else {
            $this->end_date = NULL;
        }
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

        $this->academic_year->forceFill([
            'title' => $this->title,
            'status' => $this->status,

            'start_date' => Carbon::parse($this->start_date)->toDateString(),
            'school_days' => $this->school_days,
            'end_date' => Carbon::parse($this->end_date)->toDateString(),
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
