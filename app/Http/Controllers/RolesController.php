<?php

namespace App\Http\Controllers;

class RolesController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('view_roles')) {
            return redirect('/dashboard');
        }

        return view('roles.index');
    }
}
