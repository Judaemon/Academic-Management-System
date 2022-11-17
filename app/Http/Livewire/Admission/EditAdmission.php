<?php

namespace App\Http\Livewire\Admission;

use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admission;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;

class EditAdmission extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $admission;

    public $grade_level_sections;

    public $badge_design = 'default';

    public function mount(Admission $admission)
    {
        $this->admission = $admission;

        // section id is converted to string because select value are strings
        // if not there will be no selected value
        $this->admission->section_id = (string)$admission->section_id;

        $this->grade_level_sections = Section::query()
            ->where('grade_level_id', $admission->admit_to_grade_level)
            ->get()
            ->toArray();
    }

    protected function rules()
    {
        return [
            'admission.status' => ['required'],
            'admission.academic_year_id' => ['required'],

            'admission.student_id' => ['required'],
            'admission.enrolled_by' => ['required'],
            'admission.admit_to_grade_level' => ['required'],
            'admission.section_id' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.admission.edit-admission');
    }

    public function save(): void
    {
        if ($this->admission->academic_year_id != setting('academic_year_id')) {

            $this->dialog()->info(
                $title = 'You cant do that!',
                $description = 'Past admission record cannot be modified.'
            );

            return;
        }
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
        if ($this->admission->status == "Admitted") {
            $grade_level_subjects = Subject::query()
                ->where('grade_level_id', $this->admission->admit_to_grade_level)
                ->get();

            foreach ($grade_level_subjects as $key => $subject) {
                Grade::create([
                    'first_quarter' => '',
                    'second_quarter' => '',
                    'third_quarter' => '',
                    'fourth_quarter' => '',

                    'section_id' => $this->admission->section_id,
                    'subject_id' => $subject->id,
                    'student_id' => $this->admission->student_id,
                ]);
            }
        }

        $this->authorize('update_admission');

        $this->admission->save();

        $this->emit('refreshDatatable');

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Admission information successfully Updated.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
