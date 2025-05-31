<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validate form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Optional: Check if user is admin
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['You are not authorized as admin.']);
            }
        }

        return redirect()->back()->withErrors(['Invalid credentials.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
