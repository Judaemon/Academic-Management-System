<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('view_setting')) {
            return redirect('/dashboard');
        }

        return view('settings.index');
    }
}
