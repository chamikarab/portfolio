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
     * Always return a valid public image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // Allow future full URLs (S3, CDN)
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        // Storage based image
        if (Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        return asset('assets/placeholder.svg');
    }
}
