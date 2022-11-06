<?php

namespace App\Http\Controllers;

class GradeController extends Controller
{
    public function index()
    {
        return view('student-grades.index');
    }
}
