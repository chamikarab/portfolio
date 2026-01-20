<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category',
        'description',
    ];

    /**
     * Get the image URL using Laravel Storage facade
     * 
     * This uses Storage::url() which generates URLs based on config/filesystems.php
     * For 'public' disk, it returns: APP_URL/storage/projects/filename.jpg
     * This works with storage:link symlink that bridges public/storage -> storage/app/public
     * 
     * Handles both old format (just filename) and new format (projects/filename.jpg)
     * 
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            // Return placeholder if no image is set in database
            return asset('assets/placeholder.svg');
        }

        // Normalize the path to handle both old and new formats
        // Old format: "filename.jpg" -> convert to "projects/filename.jpg"
        // New format: "projects/filename.jpg" -> use as-is
        $path = $this->image;
        
        // If path doesn't start with "projects/", assume it's just a filename
        // and prepend "projects/" directory
        if (strpos($path, 'projects/') !== 0 && strpos($path, '/') === false) {
            $path = 'projects/' . $path;
        }

        // Check if file actually exists before generating URL
        if (!Storage::disk('public')->exists($path)) {
            // File doesn't exist, return placeholder
            return asset('assets/placeholder.svg');
        }

        // Use Storage::url() to generate the correct URL
        // This respects config/filesystems.php 'public' disk configuration:
        // - root: storage_path('app/public')
        // - url: env('APP_URL') . '/storage'
        // 
        // Result: https://domain.com/storage/projects/filename.jpg
        // The /storage path is served via the symlink created by php artisan storage:link
        try {
            $url = Storage::disk('public')->url($path);
            // Ensure we have a valid URL (not empty)
            if (empty($url)) {
                return asset('assets/placeholder.svg');
            }
            return $url;
        } catch (\Exception $e) {
            // Fallback to placeholder if Storage::url() fails
            // This should rarely happen but provides safety
            return asset('assets/placeholder.svg');
        }
    }
}
