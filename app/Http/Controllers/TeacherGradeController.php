<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Exports\GradesExport;
use App\Imports\GradesImport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherGradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with('user')->simplePaginate(10);

        return view('teacher-grades.index', compact('grades'));

        $this->sections = Section::query()
            ->where('teacher_id', 5)
            ->firstOrFail();

        $this->section_students = User::query()
            ->whereHas('admission', function ($q) {
                $q->where('section_id', $this->section->id);
            })
            ->with('grades')
            ->get();
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
