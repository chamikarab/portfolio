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

    /**
     * Get the full URL for the project image
     * Handles both storage paths and fallback to placeholder
     */
    public function getImageUrlAttribute()
    {
        // If no image is set, return placeholder
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Clean the path: remove leading slashes and 'storage/' prefix if present
        $cleanPath = ltrim($this->image, '/');
        $cleanPath = preg_replace('#^storage/#', '', $cleanPath);

        // Generate the URL using asset() helper
        // This will work with both APP_URL config and relative paths
        $url = asset('storage/' . $cleanPath);

        return $url;
    }

    /**
     * Check if the image file actually exists in storage
     */
    public function imageExists()
    {
        if (!$this->image) {
            return false;
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image);
    }

    /**
     * Get the full filesystem path to the image
     */
    public function getImagePath()
    {
        if (!$this->image) {
            return null;
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->path($this->image);
    }
}