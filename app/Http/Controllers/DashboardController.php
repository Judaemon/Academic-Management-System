<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Announcement;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $announcement_start_date = Carbon::today()->format('Y-m-d');
        return view('dashboard', [
            'announcements' => Announcement::whereDate('start_date', '=', $announcement_start_date)->get(),
        ]);
    }
}
