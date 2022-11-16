<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;

use App\Models\Payments;
use App\Models\Admission;
use App\Models\AcademicYear;
use App\Models\Fee;
use App\Models\GradeLevel;

use Auth;

class AccountAndAssessment extends Component
{
    public $payment;

    public $grade_level;
    public $academic_year;

    public $school_fees;
    public $history;
    public $current;

    public function mount()
    {
        $user = Admission::where('student_id', Auth::user()->id)->latest()->first();

        $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
        $this->grade_level = GradeLevel::where('id', $user->admit_to_grade_level)->first();
        $this->academic_year = AcademicYear::where('status', "Ongoing")->first();

        $this->current = Payments::where('user_id', $user->student_id)
                                       ->whereNotNull('balance')
                                       ->where('payment_status', '!=', 'Refunded')
                                       ->where('academic_year_id', $this->academic_year->id)
                                       ->get();

        $this->history = Payments::where('user_id', $user->student_id)
                                       ->whereNotNull('balance')
                                       ->whereHas('academic_year', function($query) {
                                            $query->where('status', "Closed");
                                        })
                                       ->get();
    }

    public function render()
    {
        return view('livewire.payment.account-and-assessment', [
            'total' => $this->school_fees->sum('amount'),
        ])->layout('layouts.app');
    }

    public function download()
    {
        dd("Download PDF Assessment");
    }
}
