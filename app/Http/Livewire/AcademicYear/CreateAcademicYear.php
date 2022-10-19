<?php

namespace App\Http\Livewire\AcademicYear;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\AcademicYear;

use Carbon\Carbon;

class CreateAcademicYear extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $start_date;
    public $end_date;

    public $school_days = 0;

    protected function rules()
    {
        return [
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'school_days' => ['nullable', 'numeric'],
        ];
    }

    public function render()
    {
        return view('livewire.academic-year.create-academic-year');
    }

    public function updatedEndDate()
    {
        if($this->end_date != NULL) {
            $this->school_days = Carbon::parse($this->start_date)->diffInDays($this->end_date);
        } else {
            $this->school_days = 0;
        }
    }

    public function updatedSchoolDays()
    {
        if($this->school_days > 0) {
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
            'description' => 'Create Academic Year Level?',
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
        $this->authorize('create_academic_year');

        AcademicYear::create([
            'start_date' => Carbon::parse($this->start_date)->toDateString(),
            'school_days' => $this->school_days,
            'end_date' => Carbon::parse($this->end_date)->toDateString(),
        ]);

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Academic Year successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
