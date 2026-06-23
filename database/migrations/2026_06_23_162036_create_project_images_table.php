<?php

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        // Migrate existing single images into project_images
        Project::query()->whereNotNull('image')->where('image', '!=', '')->each(function (Project $project) {
            ProjectImage::create([
                'project_id' => $project->id,
                'image' => basename($project->image),
                'sort_order' => 0,
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_images');
    }
};
