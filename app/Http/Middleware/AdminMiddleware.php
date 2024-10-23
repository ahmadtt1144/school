<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Check if the user has the admin role or specific credentials
            if ($user->id === 1 && $user->email === 'shoes_stop@gmail.com') {
                return $next($request); 
            }
        }

        // Redirect to home page if the user is not an admin
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
