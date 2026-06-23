<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    /**
     * Get the full URL for the project cover image
     */
    public function getImageUrlAttribute(): string
    {
        $firstImage = $this->relationLoaded('images')
            ? $this->images->first()
            : $this->images()->orderBy('sort_order')->first();

        if ($firstImage) {
            return $firstImage->image_url;
        }

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

    public function imageExists(): bool
    {
        if ($this->images()->exists()) {
            return true;
        }

        if (!$this->image) {
            return false;
        }

        return File::exists($this->getImagePath());
    }

    public function syncCoverImage(): void
    {
        $firstImage = $this->images()->orderBy('sort_order')->first();

        $this->update([
            'image' => $firstImage?->image ?? '',
        ]);
    }
}
