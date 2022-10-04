<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academic_year = AcademicYear::paginate();

        return view('livewire.academic-year.index', compact('academic_year'));
    }
}
