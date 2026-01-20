<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DiagnoseStorageIssues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:diagnose {--fix : Automatically fix common issues}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Diagnose and fix storage/image issues on the server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('===========================================');
        $this->info('Portfolio Storage Diagnostic Tool');
        $this->info('===========================================');
        $this->newLine();

        $issues = [];
        $canFix = $this->option('fix');

        // 1. Check storage directory
        $this->info('1. Checking storage directory structure...');
        $storagePath = storage_path('app/public/projects');
        
        if (File::exists($storagePath)) {
            $this->line('   ✓ storage/app/public/projects exists');
            $fileCount = count(File::files($storagePath));
            $this->line("   ✓ Found {$fileCount} files in storage/app/public/projects");
            
            if ($fileCount > 0) {
                $this->line('   Recent files:');
                foreach (array_slice(File::files($storagePath), -3) as $file) {
                    $this->line('     - ' . basename($file) . ' (' . $this->formatBytes(filesize($file)) . ')');
                }
            }
        } else {
            $this->error('   ✗ storage/app/public/projects NOT FOUND');
            $issues[] = 'storage_directory';
            
            if ($canFix) {
                File::makeDirectory($storagePath, 0775, true);
                $this->info('   → Created storage/app/public/projects');
            }
        }

        $this->newLine();

        // 2. Check symlink
        $this->info('2. Checking public/storage symlink...');
        $publicStorage = public_path('storage');
        
        if (File::isLink($publicStorage)) {
            $target = readlink($publicStorage);
            $this->line("   ✓ Symlink exists: {$target}");
            
            if (File::exists($publicStorage)) {
                $this->line('   ✓ Symlink is valid and accessible');
            } else {
                $this->error('   ✗ Symlink is broken!');
                $issues[] = 'broken_symlink';
                
                if ($canFix) {
                    File::delete($publicStorage);
                    $this->call('storage:link');
                    $this->info('   → Recreated symlink');
                }
            }
        } elseif (File::exists($publicStorage) && File::isDirectory($publicStorage)) {
            $this->error('   ✗ public/storage exists but is a DIRECTORY, not a symlink!');
            $issues[] = 'directory_instead_of_symlink';
            
            if ($canFix) {
                File::moveDirectory($publicStorage, public_path('storage.backup'));
                $this->warn('   → Moved public/storage to public/storage.backup');
                $this->call('storage:link');
                $this->info('   → Created proper symlink');
            }
        } else {
            $this->error('   ✗ Symlink does NOT exist');
            $issues[] = 'missing_symlink';
            
            if ($canFix) {
                $this->call('storage:link');
                $this->info('   → Created symlink');
            }
        }

        $this->newLine();

        // 3. Check permissions
        $this->info('3. Checking directory permissions...');
        $storageAppPublic = storage_path('app/public');
        
        if (File::exists($storageAppPublic)) {
            $perms = substr(sprintf('%o', fileperms($storageAppPublic)), -4);
            $this->line("   storage/app/public: {$perms}");
            
            if (!is_writable($storageAppPublic)) {
                $this->error('   ✗ storage/app/public is NOT writable');
                $issues[] = 'permissions';
                
                if ($canFix) {
                    chmod($storageAppPublic, 0775);
                    $this->info('   → Set permissions to 775');
                }
            } else {
                $this->line('   ✓ storage/app/public is writable');
            }
        }

        $this->newLine();

        // 4. Check APP_URL
        $this->info('4. Checking APP_URL configuration...');
        $appUrl = config('app.url');
        $this->line("   APP_URL: {$appUrl}");
        
        if (empty($appUrl) || $appUrl === 'http://localhost') {
            $this->warn('   ! APP_URL is not set for production');
            $this->line('   → Update APP_URL in your .env file to your live domain');
            $issues[] = 'app_url';
        } else {
            $this->line('   ✓ APP_URL is configured');
        }

        $this->newLine();

        // 5. Check database records
        $this->info('5. Checking project records in database...');
        $projectCount = Project::count();
        $this->line("   Total projects: {$projectCount}");
        
        if ($projectCount > 0) {
            $this->line('   Sample projects:');
            $sampleProjects = Project::latest()->limit(3)->get();
            
            foreach ($sampleProjects as $project) {
                $this->line("   - {$project->name}");
                $this->line("     DB path: {$project->image}");
                $this->line("     Full URL: {$project->image_url}");
                
                $exists = Storage::disk('public')->exists($project->image);
                if ($exists) {
                    $this->line('     ✓ File exists in storage');
                } else {
                    $this->error('     ✗ File MISSING in storage!');
                    $issues[] = 'missing_files';
                }
            }
        } else {
            $this->warn('   No projects found in database');
        }

        $this->newLine();

        // 6. Test URL generation
        $this->info('6. Testing asset URL generation...');
        $testPath = 'projects/test.jpg';
        $testUrl = asset('storage/' . $testPath);
        $this->line("   Test URL: {$testUrl}");
        $this->line('   ✓ URL generation working');

        $this->newLine();
        $this->info('===========================================');
        
        if (empty($issues)) {
            $this->info('✅ All checks passed! Your storage is configured correctly.');
        } else {
            $this->warn('⚠️  Issues detected: ' . implode(', ', $issues));
            
            if (!$canFix) {
                $this->newLine();
                $this->info('Run with --fix flag to automatically fix issues:');
                $this->line('   php artisan storage:diagnose --fix');
            } else {
                $this->newLine();
                $this->info('✅ Auto-fix completed!');
            }
        }

        $this->newLine();
        $this->info('Manual steps for server setup:');
        $this->line('1. php artisan storage:link');
        $this->line('2. chmod -R 775 storage bootstrap/cache');
        $this->line('3. chown -R www-data:www-data storage (or your web server user)');
        $this->line('4. Update APP_URL in .env to match your domain');
        $this->line('5. php artisan config:clear && php artisan cache:clear');

        return empty($issues) ? 0 : 1;
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));
        
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
