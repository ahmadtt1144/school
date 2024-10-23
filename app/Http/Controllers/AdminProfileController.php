<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $admin = User::findOrFail(1); 
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . 1, 
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = User::findOrFail(1); 

        // Update the user's first name, last name, and email
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        
        // Check if the password field is filled
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password); 
        }
        $admin->save();
        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
