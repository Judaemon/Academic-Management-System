<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('settings.index', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting = Setting::first();
        
        $setting->update([
            'system_name' => $request['system_name'],
            'school_name' => $request['school_name'],
            'logo' => $request['logo'],
            'address' => $request['address'],
        ]);
        
        cache()->forget('setting');
        
        return redirect()->back()->with('success', 'System setting updated.');
    }
}
