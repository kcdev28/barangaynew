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


        $admin = DB::table('vw_admins')
            ->where('email', $email)
            ->first();


        if ($admin) {
            if (Hash::check($password, $admin->password)) {
                Session::put('user_id', $admin->userID);
                Session::put('user_name', $admin->fullname);
                Session::put('user_type', 'admin');
                Session::put('email', $admin->email);

                return redirect()->route('admin.dashboard');
            }
        }


        $resident = DB::table('tbl_residents')
            ->where('email', $email)
            ->first();

        if ($resident) {
            if (Hash::check($password, $resident->password)) {
                Session::put('user_id', $resident->residentID);
                Session::put('user_name', $resident->firstname . ' ' . $resident->lastname);
                Session::put('user_type', 'resident');
                Session::put('email', $resident->email);

                return redirect()->route('landingPage')
                    ->with('success', 'Welcome back, ' . $resident->firstname . ' ' . $resident->lastname);
            }
        }

        // If authentication fails
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('loginPage');
    }
}
