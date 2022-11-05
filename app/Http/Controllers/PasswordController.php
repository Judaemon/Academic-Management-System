<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function index()
    {
        // return view('/dashboard');

        if ((Auth::user()->password_changed_at == null)) {
            return redirect(route('change-password'));
         }
         else{
            
             return view('/dashboard');
         }
    }

    public function changePassword()
    {
        return view('change-password.change-password');
    }

    public function updatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);


        // Match the Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password doesn't match!");    
        }


        // Update the New Password
        # other code
        // User::whereId(auth()->user()->id)->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        # code from https://stackoverflow.com/questions/53636967/laravel-force-users-to-change-password-on-first-login-attempt
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->password_changed_at = Carbon::now();
        $user->save();

        return back()->with("status", "Password changed successfully!");
    }
}
