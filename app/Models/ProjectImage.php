<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

class ProjectImage extends Model
{
    protected $fillable = [
        'project_id',
        'image',
        'sort_order',
    ];

    protected $appends = ['image_url'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('assets/placeholder.svg');
        }

        $filename = basename($this->image);
        $filePath = public_path('uploads/' . $filename);

        if (!File::exists($filePath)) {
            return asset('assets/placeholder.svg');
        }

        return asset('uploads/' . $filename);
    }

    public function getImagePath(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return public_path('uploads/' . basename($this->image));
    }
}
