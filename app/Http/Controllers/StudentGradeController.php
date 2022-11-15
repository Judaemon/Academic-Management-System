<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Exports\StudentGradesExport;
use App\Imports\GradesImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentGradeController extends Controller
{
    public function index()
    {
        return view('student-grades.index');
    }

    public function export()
    {
        return Excel::download(new GradesExport, 'grades.csv');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new GradesImport, request()->file('import_file'));

        return back()->withStatus('Import done!');
    }
}
