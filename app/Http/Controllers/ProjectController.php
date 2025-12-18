<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function allProjects()
    {
        $projects = Project::all();
        return view('admin.all-projects', compact('projects'));
    }

    public function index()
    {
        $projects = Project::all(); // Fetch all projects from the database
        return view('projects', compact('projects')); // Pass the $projects variable to the view
    }
    
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project')); // A view to show individual project details
    }

    public function homeprojects()
    {
        $projects = Project::latest()->limit(3)->get();
        return view('home', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
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

        return redirect()->route('admin.all-projects')->with('success', 'Project added successfully.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.edit-project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'category' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                \Storage::delete('public/' . $project->image);
            }
            // Store new image
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = $path;
        }

        $project->update($data);

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image) {
            \Storage::delete('public/' . $project->image);
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }
}