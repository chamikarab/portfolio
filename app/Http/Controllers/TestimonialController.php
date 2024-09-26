<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Display all testimonials
    public function alltestimonials()
    {
        $testimonials = Testimonial::all();
        return view('admin.all-testimonials', compact('testimonials'));
    }

    // Show form to create a new testimonial
    public function create()
    {
        return view('admin.add-testimonial');
    }

    // Store a newly created testimonial in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'testimonial' => 'required',
        ]);

        // Store the testimonial
        Testimonial::create([
            'client_name' => $request->name,
            'testimonial' => $request->testimonial,
        ]);

        // Redirect to the all testimonials page with success message
        return redirect()->route('admin.all-testimonials')->with('success', 'Testimonial added successfully.');
    }
}