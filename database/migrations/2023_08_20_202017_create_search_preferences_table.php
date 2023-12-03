<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('search_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('cv_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('preferred_regions')->nullable();
            $table->string('skills')->nullable();
            $table->string('preferred_timezone')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('preferred_salary_range')->nullable();
            $table->boolean('authorized_to_work_in_usa')->nullable();
            $table->boolean('has_employment_work_visa')->nullable();
            $table->timestamp('job_notification_confirmed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('search_preferences');
    }
};
