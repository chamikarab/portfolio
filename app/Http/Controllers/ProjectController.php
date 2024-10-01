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