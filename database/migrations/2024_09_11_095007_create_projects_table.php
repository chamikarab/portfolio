<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{

    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('category');
            $table->string('description');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
