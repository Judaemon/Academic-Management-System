<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendances.index');
    }
}
