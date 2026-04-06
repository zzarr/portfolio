<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('profession');
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('background_image')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('location')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
