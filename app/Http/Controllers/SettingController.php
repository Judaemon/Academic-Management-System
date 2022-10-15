<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

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
