<?php

namespace App\Http\Controllers;

use App\Models\User;

// test
// use Validator;

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
