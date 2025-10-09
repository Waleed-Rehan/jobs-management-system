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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Job title, e.g., "Backend Developer"
            $table->text('description'); // Detailed job description
            $table->string('location'); // City or remote
            $table->decimal('salary', 10, 2)->nullable(); // Example: 5000.00
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'freelance'])->default('full-time');
            $table->string('experience_level')->nullable(); // e.g., "Junior", "Mid", "Senior"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
