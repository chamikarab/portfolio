<?php

/**
 * Script to fix project image paths in database
 * Run: php fix-project-paths.php
 * 
 * This will:
 * 1. Convert old "projects/" paths to "uploads/" format
 * 2. Help identify any path mismatches
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Project;
use Illuminate\Support\Facades\File;

echo "===========================================\n";
echo "Project Image Path Fixer\n";
echo "===========================================\n\n";

$projects = Project::all();

if ($projects->isEmpty()) {
    echo "No projects found in database.\n";
    exit(0);
}

echo "Found {$projects->count()} project(s) in database.\n\n";

$fixed = 0;
$notFound = 0;
$alreadyCorrect = 0;

foreach ($projects as $project) {
    echo "Project: {$project->name} (ID: {$project->id})\n";
    echo "  Current path: {$project->image}\n";
    
    // Check if it's old format
    if (strpos($project->image, 'projects/') === 0) {
        $filename = basename($project->image);
        $newPath = 'uploads/' . $filename;
        
        // Check if file exists with old extension
        $oldFile = public_path($newPath);
        $webpFile = public_path('uploads/' . preg_replace('/\.[^.]+$/', '.webp', $filename));
        
        if (file_exists($oldFile)) {
            echo "  → File exists: {$newPath}\n";
            $project->image = $newPath;
            $project->save();
            echo "  ✅ Updated to: {$newPath}\n";
            $fixed++;
        } elseif (file_exists($webpFile)) {
            $newWebpPath = 'uploads/' . preg_replace('/\.[^.]+$/', '.webp', $filename);
            echo "  → WebP file exists: {$newWebpPath}\n";
            $project->image = $newWebpPath;
            $project->save();
            echo "  ✅ Updated to: {$newWebpPath}\n";
            $fixed++;
        } else {
            echo "  ⚠️  File not found in uploads directory\n";
            $notFound++;
        }
    } elseif (strpos($project->image, 'uploads/') === 0) {
        // Check if file actually exists
        $filePath = public_path($project->image);
        if (file_exists($filePath)) {
            echo "  ✅ Path is correct and file exists\n";
            $alreadyCorrect++;
        } else {
            echo "  ⚠️  Path format is correct but file NOT FOUND: {$project->image}\n";
            echo "  → Looking for: {$filePath}\n";
            
            // Try to find similar files
            $uploadsDir = public_path('uploads');
            if (is_dir($uploadsDir)) {
                $files = File::files($uploadsDir);
                $searchName = basename($project->image);
                $similar = array_filter($files, function($file) use ($searchName) {
                    return strpos(basename($file), substr($searchName, 0, 10)) !== false;
                });
                
                if (!empty($similar)) {
                    echo "  → Found similar files:\n";
                    foreach ($similar as $file) {
                        echo "     - " . basename($file) . "\n";
                    }
                }
            }
            $notFound++;
        }
    } else {
        echo "  ⚠️  Unknown path format: {$project->image}\n";
        $notFound++;
    }
    
    echo "\n";
}

echo "===========================================\n";
echo "Summary\n";
echo "===========================================\n";
echo "Fixed: {$fixed}\n";
echo "Already correct: {$alreadyCorrect}\n";
echo "Not found/Issues: {$notFound}\n";
echo "\n";

if ($notFound > 0) {
    echo "⚠️  Some files were not found. Please check:\n";
    echo "   1. Files exist in public/uploads/ directory\n";
    echo "   2. File names match exactly (case-sensitive)\n";
    echo "   3. Permissions are correct (644 for files)\n";
}

echo "\n✅ Done!\n";
