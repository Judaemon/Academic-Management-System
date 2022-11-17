<?php

namespace App\Http\Livewire\TeacherGrade;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use App\Models\Admission;
use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UploadGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $section_id;
    public $student_id;

    public $first_quarter;
    public $second_quarter;
    public $third_quarter;
    public $fourth_quarter;

    public $student;
    public $section;
    public $subject;

    protected function rules()
    {
        return [
            // 'section_id' => ['required'],
            // 'student_id' => ['required'],

            'grades.*.first_quarter' => ['nullable'],
            'grades.*.second_quarter' => ['nullable'],
            'grades.*.third_quarter' => ['nullable'],
            'grades.*.fourth_quarter' => ['nullable'],
        ];
    }

    public function mount(User $student)
    {
        $this->student = $student;

        $this->admission = Admission::query()
            ->where('student_id', $this->student->id)
            ->latest()
            ->first();

        $this->grades = Grade::query()
            ->where('student_id', $this->student->id)
            ->with('subject')
            ->get();
        // $this->subjects = Subject::query()
        //     ->where('grade_level_id', $this->admission->admit_to_grade_level)
        //     // // ->whereHas('program', function ($q) {
        //     // // $q->where('isEnabled', true);
        //     // // })
        //     ->whereHas('grades', function (Builder $query) {
        //         $query->where('student_id', $this->student->id);
        //     })
        //     ->with('grades', function ($q) {
        //         $q->where('student_id', $this->student->id);
        //     })
        //     ->get();

        // $this->section = Section::query()
        //     ->where('teacher_id', auth()->user()->id)
        //     ->latest()
        //     ->first();
    }

    public function render()
    {
        return view('livewire.teacher-grade.upload-grade');
    }

    public function save1(): void
    {
        // dd($this->grades);
        // dd($this->subjects);
        // dd($this->admission, $this->subjects);
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Upload grades?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, upload it',
                'method' => 'submit',
                'params' => 'Uploaded',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        // $grade = Grade::create([
        //     'section_id' => $this->section_id,
        //     'student_id' => $this->student_id,
        //     'subject_id' => $this->subject_id,

        //     'first_quarter' => $this->first_quarter,
        //     'second_quarter' => $this->second_quarter,
        //     'third_quarter' => $this->third_quarter,
        //     'fourth_quarter' => $this->fourth_quarter,
        // ]);

        $this->grades->each(function ($grade) {
            $grade->save();
        });

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Grades successfully uploaded.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
