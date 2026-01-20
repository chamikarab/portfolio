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
     * Always return correct public image URL
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        // If image already contains full path
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return Storage::url($this->image);
    }
}