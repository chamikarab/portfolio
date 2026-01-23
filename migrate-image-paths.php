<?php

/**
 * Migrate existing image paths in database to new format (filename only)
 * Run: php migrate-image-paths.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Project;

echo "===========================================\n";
echo "Image Path Migration Script\n";
echo "===========================================\n\n";

$projects = Project::all();

if ($projects->isEmpty()) {
    echo "No projects found.\n";
    exit(0);
}

echo "Found {$projects->count()} project(s).\n\n";

$migrated = 0;
$skipped = 0;

foreach ($projects as $project) {
    echo "Project: {$project->name} (ID: {$project->id})\n";
    echo "  Current image: {$project->image}\n";
    
    // Extract filename from path
    $filename = $project->image;
    
    // If it contains a path, extract just the filename
    if (strpos($filename, '/') !== false) {
        $filename = basename($filename);
        echo "  → Extracted filename: {$filename}\n";
        
        // Check if file exists
        $filePath = public_path('uploads/' . $filename);
        if (file_exists($filePath)) {
            $project->image = $filename;
            $project->save();
            echo "  ✅ Migrated to: {$filename}\n";
            $migrated++;
        } else {
            echo "  ⚠️  File not found: {$filePath}\n";
            echo "  → Keeping original path\n";
            $skipped++;
        }
    } else {
        echo "  ✅ Already in correct format (filename only)\n";
        $skipped++;
    }
    
    echo "\n";
}

echo "===========================================\n";
echo "Summary\n";
echo "===========================================\n";
echo "Migrated: {$migrated}\n";
echo "Skipped/Already correct: {$skipped}\n";
echo "\n✅ Done!\n";
