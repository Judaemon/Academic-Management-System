<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Exports\TeacherGradesExport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherGradeController extends Controller
{
    public function index()
    {
        return view('teacher-grades.index');
    }

    public function export()
    {
        return Excel::download(new TeacherGradesExport, 'grades.csv');
    }
}
