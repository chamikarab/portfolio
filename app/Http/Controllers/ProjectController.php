<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class ProjectController extends Controller
{
    /**
     * Get ImageManager instance with appropriate driver
     */
    private function getImageManager()
    {
        // Try Imagick first (better quality), fallback to GD
        if (extension_loaded('imagick')) {
            return new ImageManager(new ImagickDriver());
        }
        return new ImageManager(new Driver());
    }

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
            'image' => 'required|image|max:10240', // Max 10MB
            'category' => 'required',
            'description' => 'required',
        ]);

        try {
            // Ensure uploads directory exists
            $uploadPath = public_path('uploads');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Generate unique filename with WebP extension
            $filename = time() . '_' . uniqid() . '.webp';
            $filePath = $uploadPath . '/' . $filename;

            // Process and save image using Intervention Image v3
            $manager = $this->getImageManager();
            $image = $manager->read($request->file('image')->getRealPath());
            $image->toWebp(90)->save($filePath);

            // Verify file was saved successfully
            if (!file_exists($filePath)) {
                return back()->withErrors(['image' => 'Failed to upload image. Please try again.'])->withInput();
            }

            // Store relative path in database: "uploads/filename.webp"
            Project::create([
                'name' => $request->name,
                'image' => 'uploads/' . $filename, // e.g., "uploads/1234567890_abc123.webp"
                'category' => $request->category,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.all-projects')->with('success', 'Project added successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Project creation failed: ' . $e->getMessage());
            return back()->withErrors(['image' => 'An error occurred while uploading the image. Please try again.'])->withInput();
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
            try {
                // Delete old image (handle both old storage path and new uploads path)
                if ($project->image) {
                    $oldPath = public_path($project->image);
                    // Also check old storage location for backward compatibility
                    $oldStoragePath = storage_path('app/public/' . $project->image);
                    
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    } elseif (file_exists($oldStoragePath)) {
                        unlink($oldStoragePath);
                    }
                }

                // Ensure uploads directory exists
                $uploadPath = public_path('uploads');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Generate unique filename with WebP extension
                $filename = time() . '_' . uniqid() . '.webp';
                $filePath = $uploadPath . '/' . $filename;

                // Process and save image using Intervention Image v3
                $manager = $this->getImageManager();
                $image = $manager->read($request->file('image')->getRealPath());
                $image->toWebp(90)->save($filePath);

                // Verify file was saved successfully
                if (!file_exists($filePath)) {
                    return back()->withErrors(['image' => 'Failed to upload image. Please try again.'])->withInput();
                }

                // Store relative path in database: "uploads/filename.webp"
                $data['image'] = 'uploads/' . $filename;
            } catch (\Exception $e) {
                // Log the error for debugging
                Log::error('Project image update failed: ' . $e->getMessage());
                return back()->withErrors(['image' => 'An error occurred while uploading the image. Please try again.'])->withInput();
            }
        }

        $project->update($data);

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete image file (handle both old storage path and new uploads path)
        if ($project->image) {
            $imagePath = public_path($project->image);
            // Also check old storage location for backward compatibility
            $oldStoragePath = storage_path('app/public/' . $project->image);
            
            if (file_exists($imagePath)) {
                unlink($imagePath);
            } elseif (file_exists($oldStoragePath)) {
                unlink($oldStoragePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }
}