<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ProjectController extends Controller
{
    public function allProjects()
    {
        $projects = Project::with('images')->get();
        return view('admin.all-projects', compact('projects'));
    }

    public function index()
    {
        $projects = Project::with('images')->get();
        return view('projects', compact('projects'));
    }
    
    public function show($id)
    {
        $project = Project::with('images')->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function homeprojects()
    {
        $projects = Project::with('images')->latest()->limit(3)->get();
        return view('home', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|max:10240',
            'category' => 'required',
            'description' => 'required',
        ], [
            'images.required' => 'Please upload at least one image.',
            'images.min' => 'Please upload at least one image.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.projects.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $project = Project::create([
                'name' => $request->name,
                'image' => '',
                'category' => $request->category,
                'description' => $request->description,
            ]);

            $this->storeProjectImages($project, $request->file('images', []));
            $project->syncCoverImage();

            return redirect()->route('admin.all-projects')->with('success', 'Project added successfully.');
        } catch (\Exception $e) {
            Log::error('Project creation failed: ' . $e->getMessage() . ' | Trace: ' . $e->getTraceAsString());
            $message = config('app.debug')
                ? 'Upload failed: ' . $e->getMessage()
                : 'An error occurred while uploading images. Please try again.';
            return redirect()->route('admin.projects.create')
                ->withErrors(['images' => $message])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $project = Project::with('images')->findOrFail($id);
        return view('admin.edit-project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::with('images')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|max:10240',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.projects.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $project->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            try {
                $this->storeProjectImages(
                    $project,
                    $request->file('images', []),
                    $project->images()->max('sort_order') ?? -1
                );
            } catch (\Exception $e) {
                Log::error('Project image update failed: ' . $e->getMessage());
                $message = config('app.debug')
                    ? 'Upload failed: ' . $e->getMessage()
                    : 'An error occurred while uploading images. Please try again.';
                return redirect()->route('admin.projects.edit', $id)
                    ->withErrors(['images' => $message])
                    ->withInput();
            }
        }

        $project->syncCoverImage();

        return redirect()->route('admin.all-projects')->with('success', 'Project updated successfully.');
    }

    public function destroyImage($projectId, $imageId)
    {
        $project = Project::findOrFail($projectId);
        $projectImage = $project->images()->findOrFail($imageId);

        $this->deleteImageFile($projectImage->image);
        $projectImage->delete();
        $project->syncCoverImage();

        return back()->with('success', 'Image removed successfully.');
    }

    public function destroy($id)
    {
        $project = Project::with('images')->findOrFail($id);

        foreach ($project->images as $projectImage) {
            $this->deleteImageFile($projectImage->image);
        }

        if ($project->image) {
            $this->deleteImageFile($project->image);
        }

        $project->delete();

        return redirect()->route('admin.all-projects')->with('success', 'Project deleted successfully.');
    }

    private function storeProjectImages(Project $project, array $files, int $startOrder = -1): void
    {
        $uploadPath = public_path('uploads');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $sortOrder = $startOrder + 1;

        foreach ($files as $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $filename = $this->uploadImageFile($file, $uploadPath);

            ProjectImage::create([
                'project_id' => $project->id,
                'image' => $filename,
                'sort_order' => $sortOrder++,
            ]);
        }
    }

    private function uploadImageFile($file, string $uploadPath): string
    {
        try {
            $filename = time() . '_' . uniqid() . '.webp';
            $filePath = $uploadPath . '/' . $filename;
            $manager = new ImageManager(new GdDriver());
            $image = $manager->read($file);
            $image->toWebp(90)->save($filePath);
        } catch (\Exception $e) {
            Log::warning('WebP conversion failed, falling back to original format: ' . $e->getMessage());
            $ext = strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (!in_array($ext, $allowed)) {
                $ext = 'jpg';
            }
            $filename = time() . '_' . uniqid() . '.' . $ext;
            $file->move($uploadPath, $filename);
            $filePath = $uploadPath . '/' . $filename;
        }

        if (!File::exists($filePath)) {
            throw new \RuntimeException('Failed to save uploaded image.');
        }

        return $filename;
    }

    private function deleteImageFile(?string $image): void
    {
        if (!$image) {
            return;
        }

        $path = public_path('uploads/' . basename($image));
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
