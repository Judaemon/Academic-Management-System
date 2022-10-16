<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GradeLevel;

class GradeLevelController extends Controller
{
    public function index()
    {
        return view('grade-levels.index');
    }
}
