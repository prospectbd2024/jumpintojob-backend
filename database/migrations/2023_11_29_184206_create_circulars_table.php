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
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('NO ACTION');
            $table->foreignId('employer_id')->constrained()->onDelete('NO ACTION');
            $table->foreignId('company_id')->constrained()->onDelete('NO ACTION');
            $table->text('title');
            $table->text('description');
            $table->string('availability')->nullable();
            // $table->string('phone');
            $table->string('slug')->unique();
            $table->string('location');
            $table->string('location_type');
            $table->string('vacancies');
            $table->string('employment_type'); // Full-time, part-time, contract, etc.
            $table->string('experience_level')->nullable(); // Entry-level, mid-level, senior-level
            $table->boolean('is_remote')->default(0);
            $table->string('salary'); // Salary range
            $table->date('deadline');
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
