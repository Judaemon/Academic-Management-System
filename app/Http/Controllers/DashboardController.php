<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->password_changed_at == null)) {
            return redirect(route('change-password'));
        } else {
            $now = Carbon::today()->format('Y-m-d');
            return view('dashboard', [
                'announcements' => Announcement::whereDate('start_date', '>=', $now)->whereDate('end_date', '<=', $now)->get(),
            ]);
        }

        $now = Carbon::today()->format('Y-m-d');
        $announcements = Announcement::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->get();

        return view('dashboard', [
            'announcements' => $announcements,
        ]);
    }
}
