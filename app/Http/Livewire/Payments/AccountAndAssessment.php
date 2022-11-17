<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Payments;
use App\Models\Admission;
use App\Models\AcademicYear;
use App\Models\Fee;
use App\Models\User;
use App\Models\GradeLevel;

use Auth;
use PDF;

class AccountAndAssessment extends Component
{
    use AuthorizesRequests, Actions;

    public $payment;

    public $grade_level;
    public $academic_year;
    public $total;

    public $school_fees;
    public $history;
    public $current;

    public $acad_year;
    public $amount_paid;
    public $method;
    public $others;
    public $balance;

    public function mount()
    {
        $user = Admission::where('student_id', Auth::user()->id)->latest()->first();

        $this->school_fees = Fee::where('grade_level_id', $user->admit_to_grade_level)->get();
        $this->total = $this->school_fees->sum('amount');
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

        $this->latest_total = Payments::where('user_id', $user->student_id)
                                        ->whereNotNull('balance')
                                        ->where('payment_status', '!=', 'Refunded')
                                        ->where('academic_year_id', $this->academic_year->id)
                                        ->latest()
                                        ->first();
    }

    protected function rules()
    {
        return [
            'acad_year' => ['required', 'unique:academic_years,id,'.$this->acad_year],
            'amount_paid' => ['required', 'numeric'],
            'balance' => ['nullable', 'numeric'],
            'method' => ['required'],
        ];
    }

    public function updatedAmountPaid()
    {
        if(!empty($this->amount_paid)) {
            if(!empty($this->latest_total->balance) && $this->latest_total->balance !== '0.00') {
                $this->balance = floatval($this->latest_total->balance - $this->amount_paid);              
            } else {
                $this->balance = floatval($this->total - $this->amount_paid);
            }

            if($this->balance > 0){
                $this->others = "Total Fee - Partial Payment";
            } else {
                $this->others = "Total Fee - Full Payment";
            }
        } else {
            $this->balance = NULL;
        }
    }

    public function render()
    {
        return view('livewire.payment.account-and-assessment', [
            'school_year' => AcademicYear::where('status', "Closed")->orderBy('start_date', 'DESC')->get(),
            'g_lvl_link' => Admission::where('student_id', Auth::user()->id)->get(),
        ])->layout('layouts.app');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Confirm Online Payment',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Confirm',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, Cancel',
            ],
        ]);
    }

    public function submit()
    {
        Payments::create([
            'user_id' => Auth::user()->id,
            'accountant_id' => NULL,
            'amount_paid' => $this->amount_paid,
            'fee_id' => NULL,
            'payment_method' => $this->method,
            'balance' => $this->balance,
            'others' => $this->others,
            'academic_year_id' => $this->acad_year,
            'payment_status' => "Pending",
        ]);
            
        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Payment has been Recorded.'
        );

        return redirect()->route('student.payments');
    }

    public function download(AcademicYear $year)
    { 
        $payment = Payments::where('user_id', Auth::user()->id)
                             ->whereNotNull('balance')
                             ->whereHas('academic_year', function($query) use ($year) {
                                    $query->where('id', $year->id);
                                })
                             ->get();
        dd("Confirm");
        
        // view()->share(, $data);
        // $pdf = PDF::loadView()
        
        // return $pdf->download('');
    }

    public function resetForm()
    {
        $this->acad_year = '';
        $this->amount_paid = '';
        $this->method = '';
        $this->others = '';
        $this->balance = '';
    }
}
