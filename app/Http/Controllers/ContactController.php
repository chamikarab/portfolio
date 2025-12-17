<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Handle contact form submission
        // You can add validation and email sending logic here
        
        return redirect()->route('contact')->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}

