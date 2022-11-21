<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\AcademicYear;
use App\Models\Admission;

use Illuminate\Http\Request;
use App\Exports\StudentGradesExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

class StudentGradeController extends Controller
{
    public function index()
    {
        return view('student-grades.index');
    }

    public function export()
    {
        return Excel::download(new StudentGradesExport, 'grades.csv');
    }

    public function generate_pdf($user, $admission)
    {   
        $settings = Setting::find(1);
        $users = User::find($user);

        $now = Carbon::today()->format('Y-m-d');

        $admission = Admission::find($admission)->where('student_id', $users->id)->first();
        $academic_year = AcademicYear::where('status', 'Ongoing')->first();

        $subjects = Subject::query()
                             ->where('grade_level_id', $admission->admit_to_grade_level)
                             ->with(['grades' => function ($q) use($admission) {
                                    $q->where('student_id', $admission->student_id);
                                }])
                             ->get();
    
        $grades = Subject::query()
                           ->where('grade_level_id', $admission->admit_to_grade_level)
                           ->with(['grades' => function ($q) use($admission) {
                                    $q->where('student_id', $admission->student_id);
                                }])
                           ->get();

        $pdf = Pdf::loadView('student-grades.report-card', compact('users', 'settings', 'academic_year', 'subjects', 'grades', 'admission', 'now'));  
        return $pdf->download();
    }
}
