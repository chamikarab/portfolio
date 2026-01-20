<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Illuminate\Support\Facades\File;

class MigrateProjectImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projects:migrate-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate project images from storage/app/public to public/assets/projects';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting image migration...');

        // Ensure target directory exists
        $targetDir = public_path('assets/projects');
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
            $this->info('Created directory: ' . $targetDir);
        }

        $projects = Project::whereNotNull('image')->get();
        $migrated = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($projects as $project) {
            try {
                // Extract filename from old path (handles both "projects/filename.jpg" and "filename.jpg")
                $oldPath = $project->image;
                $filename = basename($oldPath);

                // Try to find image in old storage location
                $sourcePath = storage_path('app/public/' . $oldPath);
                
                // If old path format is "projects/filename.jpg", try that
                if (!File::exists($sourcePath) && strpos($oldPath, 'projects/') === 0) {
                    $sourcePath = storage_path('app/public/' . $oldPath);
                } elseif (!File::exists($sourcePath)) {
                    // Try just the filename in projects folder
                    $sourcePath = storage_path('app/public/projects/' . $filename);
                }

                $targetPath = $targetDir . '/' . $filename;

                if (File::exists($sourcePath)) {
                    // Copy file to new location
                    File::copy($sourcePath, $targetPath);
                    
                    // Update database to store only filename
                    $project->image = $filename;
                    $project->save();
                    
                    $migrated++;
                    $this->line("Migrated: {$filename}");
                } else {
                    // Image doesn't exist in storage, just update database
                    $project->image = $filename;
                    $project->save();
                    $skipped++;
                    $this->warn("Image not found, updated DB only: {$filename}");
                }
            } catch (\Exception $e) {
                $errors++;
                $this->error("Error migrating {$project->name}: " . $e->getMessage());
            }
        }

        $this->info("\nMigration complete!");
        $this->info("Migrated: {$migrated}");
        $this->info("Skipped (not found): {$skipped}");
        $this->info("Errors: {$errors}");

        return 0;
    }
}
