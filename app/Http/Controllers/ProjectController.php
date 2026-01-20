<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        // Ensure directory exists
        $uploadPath = public_path('assets/projects');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Generate unique filename
        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Move file to public/assets/projects
        $file->move($uploadPath, $filename);

        // Store only filename in database
        Project::create([
            'name' => $request->name,
            'image' => $filename,
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
            // Ensure directory exists
            $uploadPath = public_path('assets/projects');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Delete old image
            if ($project->image) {
                $oldImagePath = public_path('assets/projects/' . basename($project->image));
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            
            // Generate unique filename
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Move file to public/assets/projects
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }

        $project->update($data);

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete image file
        if ($project->image) {
            $imagePath = public_path('assets/projects/' . basename($project->image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }
}