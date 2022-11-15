<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Announcement;
use App\Notifications\AnnouncementNotification;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::today()->format('Y-m-d');              
        $announcements = Announcement::where('start_date', '<=', $now)
                                      ->where('end_date', '>=', $now)
                                      ->get();

        return view('dashboard', [
            'announcements' => $announcements,
        ]);
    }
}
