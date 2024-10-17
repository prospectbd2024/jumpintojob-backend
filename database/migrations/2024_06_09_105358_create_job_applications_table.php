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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user applying for the job
            $table->unsignedBigInteger('job_id'); // job being applied to
            $table->enum('status', ['pending', 'shortlisted', 'rejected', 'interviewed'])->default('pending'); // application status
            $table->string('cv_id')->nullable(); // reference to the CV
            $table->string('forwarding_letter_type'); // type of cover letter
            $table->longText('forwarding_letter'); // actual forwarding letter content
            $table->string('cv_file')->nullable(); // path to the uploaded CV file
            $table->timestamp('submitted_at')->useCurrent(); // when the application was submitted
            $table->timestamp('interview_time')->nullable(); // scheduled interview time (if applicable)
            $table->text('interview_notes')->nullable(); // notes related to the interview
            $table->text('rejection_reason')->nullable(); // reason for rejecting the application (if applicable)
            $table->timestamps(); // created_at and updated_at timestamps
            $table->softDeletes(); // enables soft deletes
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
