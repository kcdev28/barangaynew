<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('landingPage');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        // Try to authenticate from vw_admins first
        $admin = DB::table('vw_admins')
            ->where('email', $email)
            ->first();

        if ($admin) {
            // Verify password for admin
            if ($admin->password) {
                // Store admin session data
                Session::put('user_id', $admin->userID);
                Session::put('user_name', $admin->fullname);
                Session::put('user_type', 'admin');
                Session::put('email', $admin->email);

                return redirect()->route('admin.dashboard');
            }
        }

        // If not found in admin, try tbl_residents (for future implementation)
        // $resident = DB::table('tbl_residents')
        //     ->where('email', $email)
        //     ->first();

        // if ($resident) {
        //     if (Hash::check($password, $resident->password)) {
        //         Session::put('user_id', $resident->id);
        //         Session::put('user_name', $resident->full_name);
        //         Session::put('user_type', 'resident');
        //         Session::put('email', $resident->email);

        //         return redirect()->route('resident.dashboard')
        //             ->with('success', 'Welcome back, ' . $resident->full_name);
        //     }
        // }

        // If authentication fails
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('success', 'You have been logged out successfully');
    }
}
