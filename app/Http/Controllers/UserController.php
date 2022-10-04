<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('view_users')) {
            return redirect('/dashboard');
        }

        return view('users.index');
    }
}
