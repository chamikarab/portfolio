<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function allTestimonials()
    {
        $testimonials = Testimonial::all();
        return view('admin.all-testimonials', compact('testimonials'));
    }


    public function create()
    {
        return view('admin.add-testimonial');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'testimonial' => 'required',
        ]);


        Testimonial::create([
            'client_name' => $request->name,
            'testimonial' => $request->testimonial,
        ]);


        return redirect()->route('admin.all-testimonials')->with('success', 'Testimonial added successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.edit-testimonial', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'testimonial' => 'required',
        ]);

        $testimonial->update([
            'client_name' => $request->name,
            'testimonial' => $request->testimonial,
        ]);

        return redirect()->route('admin.all-testimonials')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonials = Testimonial::findOrFail($id);


        $testimonials->delete();

        return redirect()->route('admin.all-testimonials')->with('success', 'Testimonial deleted successfully.');
    }
}