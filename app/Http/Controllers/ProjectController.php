<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Generate unique filename to prevent collisions
        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store file using Laravel Storage facade
        // This saves to: storage/app/public/projects/filename.jpg
        // Database stores: projects/filename.jpg
        $path = Storage::disk('public')->putFileAs('projects', $file, $filename);
        
        // Verify file was stored successfully
        if (!$path) {
            return back()->withErrors(['image' => 'Failed to upload image. Please try again.'])->withInput();
        }

        // Store path relative to storage/app/public in database
        // Format: projects/filename.jpg
        Project::create([
            'name' => $request->name,
            'image' => $path, // e.g., "projects/filename.jpg"
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
            // Delete old image from storage
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            
            // Generate unique filename to prevent collisions
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store file using Laravel Storage facade
            // This saves to: storage/app/public/projects/filename.jpg
            // Database stores: projects/filename.jpg
            $path = Storage::disk('public')->putFileAs('projects', $file, $filename);
            
            // Verify file was stored successfully
            if (!$path) {
                return back()->withErrors(['image' => 'Failed to upload image. Please try again.'])->withInput();
            }

            // Store path relative to storage/app/public in database
            $data['image'] = $path; // e.g., "projects/filename.jpg"
        }

        $project->update($data);

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete image file from storage
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }
}