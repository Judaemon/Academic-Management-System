<?php

namespace App\Http\Livewire\Subject;

use App\Models\GradeLevel;
use LivewireUI\Modal\ModalComponent;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ViewSubject extends ModalComponent
{
    public $subject;

    public $teacher;

    public $grade_level;

    protected function rules()
    {
        return [
            'subject.name' => ['required'],
            'subject.subject_code' => ['required'],
            'subject.teacher_id' => [],
            'subject.grade_level_id' => ['required'],
        ];
    }
    
    public function mount(Subject $subject)
    {
        $this->subject = $subject;

        $this->grade_level = GradeLevel::query()
            ->select('name')
            ->find($subject->grade_level_id);

        $this->teacher = User::query()
            ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"))
            ->find($subject->teacher_id);
    }

    public function render()
    {
        return view('livewire.subject.view-subject');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
