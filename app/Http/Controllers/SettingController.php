<?php

namespace App\Http\Controllers;

class SettingController extends Controller
{
    public function index()
    {
        if (!$this->authorize('view_setting')) {
            return redirect('/dashboard');
        }

        return view('settings.index');
    }
}
