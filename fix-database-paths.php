<?php

/**
 * Script to fix database paths based on actual files
 * Run: php fix-database-paths.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Project;
use Illuminate\Support\Facades\File;

echo "===========================================\n";
echo "Database Path Fixer\n";
echo "===========================================\n\n";

$uploadsDir = public_path('uploads');
if (!is_dir($uploadsDir)) {
    echo "❌ uploads directory does not exist!\n";
    exit(1);
}

$files = File::files($uploadsDir);
$fileList = array_map(function($file) {
    return basename($file);
}, $files);

echo "Found " . count($fileList) . " file(s) in uploads directory:\n";
foreach ($fileList as $file) {
    echo "  - {$file}\n";
}
echo "\n";

$projects = Project::all();
$fixed = 0;

foreach ($projects as $project) {
    echo "Project: {$project->name} (ID: {$project->id})\n";
    echo "  Current DB path: {$project->image}\n";
    
    $currentFile = basename($project->image);
    
    // Extract timestamp from current filename (first part before underscore)
    $parts = explode('_', $currentFile);
    $timestamp = $parts[0] ?? '';
    
    // Try to find matching file by timestamp
    $found = false;
    foreach ($fileList as $actualFile) {
        // Check if filenames start with same timestamp
        if (strpos($actualFile, $timestamp . '_') === 0) {
            // Found matching file by timestamp!
            $newPath = 'uploads/' . $actualFile;
            echo "  ✅ Found matching file by timestamp: {$actualFile}\n";
            echo "  → Updating database to: {$newPath}\n";
            $project->image = $newPath;
            $project->save();
            echo "  ✅ Database updated successfully!\n";
            $fixed++;
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        echo "  ⚠️  No matching file found for timestamp: {$timestamp}\n";
        echo "  → This project's image may need to be re-uploaded\n";
        echo "  → Or the file may be in a different location\n";
    }
    
    echo "\n";
}

echo "===========================================\n";
echo "Summary\n";
echo "===========================================\n";
echo "Fixed: {$fixed} project(s)\n";
echo "\n✅ Done! Refresh your website to see the changes.\n";
