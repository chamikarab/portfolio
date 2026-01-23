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

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Database stores: "uploads/filename.webp" (new) or "projects/filename.jpg" (old)
        // For new images: "uploads/filename.webp" -> asset('uploads/filename.webp')
        // For old images: "projects/filename.jpg" -> asset('storage/projects/filename.jpg')
        if (strpos($this->image, 'uploads/') === 0) {
            // New path: already in public/uploads, use directly
            return asset($this->image);
        } else {
            // Old path: in storage/app/public, need storage/ prefix
            return asset('storage/' . $this->image);
        }
    }
}