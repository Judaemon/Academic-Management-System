<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectScheduleController extends Controller
{
    public function index()
    {
        return view('subject-schedules.index');
    }
}
