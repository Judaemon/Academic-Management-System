<?php

namespace App\Http\Controllers;

class GradeController extends Controller
{
    public function index()
    {
        return view('teacher-grades.index');
    }
}
