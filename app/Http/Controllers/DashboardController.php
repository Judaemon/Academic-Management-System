<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Announcement;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'announcements' => Announcement::whereDate('date', '=', Carbon::today()->format('Y-m-d'))->get(),
        ]);
    }
}
