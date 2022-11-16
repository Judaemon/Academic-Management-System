<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $roles = $user->roles->pluck('name');

        $admission = $user->roles->pluck('name');

        return view('auth.profile', compact('roles'));
    }
}
