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

    /**
     * Get the image URL (handles both old storage paths and new public paths)
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Extract filename from old storage path format (e.g., "projects/filename.jpg" -> "filename.jpg")
        $filename = basename($this->image);
        
        // Check if image exists in new location
        $imagePath = public_path('assets/projects/' . $filename);
        if (file_exists($imagePath)) {
            return asset('assets/projects/' . $filename);
        }

        // Fallback to placeholder if image not found
        return asset('assets/placeholder.svg');
    }
}
