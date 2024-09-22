<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $path = $request->file('image')->store('projects', 'public');

        Project::create([
            'name' => $request->name,
            'image' => $path,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Project added successfully.');
    }
}

