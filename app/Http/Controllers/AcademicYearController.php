<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view('academic-years.index');
    }
}
