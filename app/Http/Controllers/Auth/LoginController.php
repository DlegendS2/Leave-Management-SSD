<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Helpers\Audit;

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
    $credentials = $request->validate([
        'email' => ['required','email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Invalid login credentials'
        ]);
    }

    $request->session()->regenerate();

    // DEBUG: force redirect based on DB role
    $role = auth()->user()->role;

    if (auth()->user()->role === 'admin') {
    return redirect()->intended('/admin/dashboard');
} else {
    return redirect()->intended('/staff/profile');
}

    // If role is missing or invalid
    Auth::logout();
    return back()->withErrors([
        'email' => 'User role not assigned. Contact admin.'
    ]);
}

    // Handle logout
    public function logout(Request $request)
    {
        // Log before logout
        Audit::log("logout", "User logged out");

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
