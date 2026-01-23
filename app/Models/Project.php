<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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

    /**
     * Get the full URL for the project image
     * Handles multiple path formats for compatibility
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Extract filename from path if it contains a directory
        $filename = $this->image;
        if (strpos($this->image, '/') !== false) {
            $filename = basename($this->image);
        }

        // Generate URL - always use uploads/ prefix
        // asset() will use APP_URL from .env
        $url = asset('uploads/' . $filename);

        // Verify file exists before returning URL
        $filePath = public_path('uploads/' . $filename);
        if (!File::exists($filePath)) {
            // File doesn't exist, return placeholder
            return asset('assets/placeholder.svg');
        }

        return $url;
    }

    /**
     * Get the filesystem path for the image
     */
    public function getImagePath()
    {
        if (!$this->image) {
            return null;
        }

        $filename = $this->image;
        if (strpos($this->image, '/') !== false) {
            $filename = basename($this->image);
        }

        return public_path('uploads/' . $filename);
    }

    /**
     * Check if the image file exists
     */
    public function imageExists()
    {
        if (!$this->image) {
            return false;
        }

        return File::exists($this->getImagePath());
    }
}
