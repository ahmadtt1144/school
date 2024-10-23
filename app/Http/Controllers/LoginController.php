<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('pages.login');  
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

   
    \Log::info('Login attempt:', $credentials);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        \Log::info('Logged in user ID: ' . $user->id);
        
        if ($user->id === 1) {
            
            return redirect()->route('dashboard')->with('success', 'Login successful! Welcome to the admin panel.');
        }

        return redirect()->route('home')->with('success', 'Login successful! Welcome to the homepage.');
    }

    // Log failed login attempt
    \Log::info('Failed login attempt for email: ' . $request->email);
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput(); 
}


    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
