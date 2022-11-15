<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Password;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->password_changed_at == null)) {
            return redirect(route('change-password'));
         }
         else{
            $now = Carbon::today()->format('Y-m-d');
            return view('dashboard', [
                'announcements' => Announcement::whereDate('start_date', '>=', $now)->whereDate('end_date', '<=', $now)->get(),
            ]);
         }
    }
}
