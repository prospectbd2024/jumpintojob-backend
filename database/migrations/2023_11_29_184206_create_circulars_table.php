<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->binary('title');
            $table->binary('description');
            $table->string('slug')->unique();
            $table->binary('current_company_name');
            $table->binary('location');
            $table->binary('location_type');
            $table->binary('vacancies');
            $table->binary('employment_type'); // Full-time, part-time, contract, etc.
            $table->binary('salary')->nullable(); // Salary range
            $table->binary('experience_level'); // Entry-level, mid-level, senior, etc.
            $table->date('deadline');
            $table->boolean('is_remote')->default(0); // Whether the job is remote
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
