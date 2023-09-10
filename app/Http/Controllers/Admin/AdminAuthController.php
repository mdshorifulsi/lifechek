<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.admin_login');

    }
    public function admin_dashboard()
    {

        return view('admin.admin_dashboard');

    }
    public function admin_login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('dashboard');

        } else {
            return redirect()->back();
            // Session::flash('error-msg','invalid password');

        }



    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login_form');

    }


}