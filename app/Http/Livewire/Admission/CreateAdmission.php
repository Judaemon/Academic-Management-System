<?php

namespace App\Http\Livewire\Admission;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;
use App\Models\Section;
use App\Models\User;
use App\Rules\NotAdmittedForCurrentAcademicYear;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateAdmission extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $student_id;
    public $student;

    public $grade_level_id;

    public $section_id;
    public $section;

    protected function rules()
    {
        return [
            'grade_level_id' => ['required'],
            'student_id' => ['required', new NotAdmittedForCurrentAcademicYear],
            'section_id' => ['required'],
        ];
    }
    public function render()
    {
        return view('livewire.admission.create-admission');
    }

    public function updatedStudentId()
    {
        $this->student = User::query()
            ->find($this->student_id);
    }

    public function updatedGradeLevelId($value)
    {
        $this->grade_level_sections = Section::query()
            ->where('grade_level_id', $value)
            ->get()
            ->toArray();

        $this->section_id = null;
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
        $this->authorize('create_admission');

        Admission::create([
            'status' => 'Pending',
            'academic_year_id' => setting('academic_year_id'),

            'student_id' => $this->student_id,
            'enrolled_by' => auth()->id(),
            'admit_to_grade_level' => $this->grade_level_id,
            'section_id' => $this->section_id,
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
        return '3xl';
    }
}
