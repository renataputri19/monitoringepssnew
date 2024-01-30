<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Use Auth facade

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login'); // Ensure this view path is correct
    }

    // Handle the login request
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // Use Auth::attempt() to authenticate
        if (Auth::attempt($credentials)) {
            // Authentication was successful...
            return redirect()->intended('epss'); // Redirect to intended or a specified default
        }

        // Authentication failed...
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
