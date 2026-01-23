<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category',
        'description',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Handle both old and new path formats
        // Old format: "projects/filename.jpg" (from storage/app/public/projects/)
        // New format: "uploads/filename.webp" (from public/uploads/)
        
        // If old format (starts with "projects/"), convert to new format
        if (strpos($this->image, 'projects/') === 0) {
            // Convert old path to new path format
            $filename = basename($this->image);
            // Change extension to .webp if it's an old image
            $newFilename = preg_replace('/\.[^.]+$/', '.webp', $filename);
            return asset('uploads/' . $newFilename);
        }

        // New format: "uploads/filename.webp"
        // Use asset() directly since images are in public/uploads
        return asset($this->image);
    }
}