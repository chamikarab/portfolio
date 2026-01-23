<?php

/**
 * Quick script to check image URLs and file paths
 * Run: php check-image-urls.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Project;

echo "===========================================\n";
echo "Image URL Checker\n";
echo "===========================================\n\n";

$projects = Project::all();

foreach ($projects as $project) {
    echo "Project: {$project->name}\n";
    echo "  Database path: {$project->image}\n";
    echo "  Generated URL: {$project->image_url}\n";
    
    // Check if file exists
    if (strpos($project->image, 'uploads/') === 0) {
        $filePath = public_path($project->image);
        $exists = file_exists($filePath);
        echo "  File path: {$filePath}\n";
        echo "  File exists: " . ($exists ? "✅ YES" : "❌ NO") . "\n";
        
        if (!$exists) {
            // List files in uploads directory
            $uploadsDir = public_path('uploads');
            if (is_dir($uploadsDir)) {
                $files = glob($uploadsDir . '/*');
                echo "  Files in uploads directory:\n";
                foreach ($files as $file) {
                    if (is_file($file)) {
                        echo "    - " . basename($file) . "\n";
                    }
                }
            }
        }
    }
    
    echo "\n";
}

echo "===========================================\n";
echo "APP_URL: " . config('app.url') . "\n";
echo "===========================================\n";
