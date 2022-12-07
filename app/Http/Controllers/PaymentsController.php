<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Admission;
use App\Models\AcademicYear;
use App\Models\Payments;
use App\Models\Fee;
use App\Models\Setting;
use App\Models\User;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('payments.index');
    }

    public function generate_pdf($user, $payments)
    {
        $settings = Setting::find(1);
        $users = User::find($user);
        $pay = Payments::find($payments);

        $admit = Admission::where('student_id', $users->id)->latest()->first();
        $accountant = User::where('id', $pay->accountant_id)->first();
        $latest_acad_yr = AcademicYear::where('status', "Ongoing")->first();

        if($pay->academic_year_id === $latest_acad_yr->id) {
            $school_fees = Fee::where('grade_level_id', $admit->admit_to_grade_level)->get();
            $payment = Payments::where('user_id', $user)
                            ->where('payment_status', 'Paid')
                            ->where('created_at', '<=', $pay->created_at)
                            ->whereHas('academic_year', function($query) {
                                    $query->where('status', "Ongoing");
                                })
                            ->whereNotNull('balance')
                            ->get();
        } else {
            $school_fees = NULL;
            $payment = Payments::where('user_id', $user)
                                 ->where('payment_status', 'Paid')
                                 ->where('created_at', '<=', $pay->created_at)
                                 ->whereHas('academic_year', function($query) {
                                        $query->where('status', "Closed");
                                    })
                                 ->whereNotNull('balance')
                                 ->get();
        }
      
        $pdf = Pdf::loadView('payments.receipt', compact('users', 'pay', 'payment', 'settings', 'accountant', 'admit', 'school_fees'));  
        return $pdf->download();
    }
}