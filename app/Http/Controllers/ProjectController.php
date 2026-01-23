<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ProjectController extends Controller
{
    public function allProjects()
    {
        $projects = Project::all();
        return view('admin.all-projects', compact('projects'));
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }
    
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|max:10240', // Max 10MB
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.projects.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Ensure uploads directory exists in public folder
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Generate unique filename with .webp extension
            $filename = time() . '_' . uniqid() . '.webp';
            $filePath = $uploadPath . '/' . $filename;

            // Process and save image using Intervention/Image v3
            // Convert to WebP with 90% quality using GD driver
            $manager = new ImageManager(new GdDriver());
            $image = $manager->read($request->file('image'));
            $image->toWebp(90)->save($filePath);

            // Verify file was saved successfully
            if (!File::exists($filePath)) {
                return redirect()->route('admin.projects.create')
                    ->withErrors(['image' => 'Failed to upload image. Please try again.'])
                    ->withInput();
            }

            // Store ONLY the filename in database (not the full path)
            // This makes it easier to handle different server configurations
            Project::create([
                'name' => $request->name,
                'image' => $filename, // Store just filename: "1234567890_abc123.webp"
                'category' => $request->category,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.all-projects')->with('success', 'Project added successfully.');
        } catch (\Exception $e) {
            Log::error('Project creation failed: ' . $e->getMessage());
            return redirect()->route('admin.projects.create')
                ->withErrors(['image' => 'An error occurred while uploading the image. Please try again.'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.edit-project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.projects.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            try {
                // Delete old image from public/uploads
                if ($project->image) {
                    $oldImagePath = $this->getImagePath($project->image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Ensure uploads directory exists
                $uploadPath = public_path('uploads');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }

                // Generate unique filename with .webp extension
                $filename = time() . '_' . uniqid() . '.webp';
                $filePath = $uploadPath . '/' . $filename;

                // Process and save image using Intervention/Image v3
                // Convert to WebP with 90% quality using GD driver
                $manager = new ImageManager(new GdDriver());
                $image = $manager->read($request->file('image'));
                $image->toWebp(90)->save($filePath);

                // Verify file was saved successfully
                if (!File::exists($filePath)) {
                    return redirect()->route('admin.projects.edit', $id)
                        ->withErrors(['image' => 'Failed to upload image. Please try again.'])
                        ->withInput();
                }

                // Store ONLY the filename in database
                $data['image'] = $filename;
            } catch (\Exception $e) {
                Log::error('Project image update failed: ' . $e->getMessage());
                return redirect()->route('admin.projects.edit', $id)
                    ->withErrors(['image' => 'An error occurred while uploading the image. Please try again.'])
                    ->withInput();
            }
        }

        $project->update($data);

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete image file from public/uploads
        if ($project->image) {
            $imagePath = $this->getImagePath($project->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }

    /**
     * Get the full filesystem path for an image
     * Handles both old format (with path) and new format (filename only)
     */
    private function getImagePath($image)
    {
        // If image contains a path (old format), extract filename
        if (strpos($image, '/') !== false) {
            $filename = basename($image);
        } else {
            $filename = $image;
        }
        
        return public_path('uploads/' . $filename);
    }
}
