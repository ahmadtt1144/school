<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs; // Assuming this model exists

class ContactUsController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
    
        // Store form data in the database
        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
    
        // Redirect to homepage with a success message
        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }
    
}
