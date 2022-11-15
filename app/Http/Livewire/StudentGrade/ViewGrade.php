<?php

namespace App\Http\Livewire\StudentGrade;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ViewGrade extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $grade;

    protected function rules()
    {
        return [
            'subject_id' => ['required'],

            'first_quarter' => ['nullable'],
            'second_quarter' => ['nullable'],
            'third_quarter' => ['nullable'],
            'fourth_quarter' => ['nullable'],
        ];
    }

    public function mount(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function render()
    {
        return view('livewire.student-grade.view-grade');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
