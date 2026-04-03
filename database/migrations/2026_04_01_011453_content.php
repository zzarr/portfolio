<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        //Project table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable(); // ringkasan
            $table->text('tech_stack')->nullable();
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });


        //Tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        //Project tags table
        Schema::create('project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        //Note
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        //Note tags table
        Schema::create('note_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::dropIfExists('project_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('note_tag');
        Schema::dropIfExists('notes');
    }
};
