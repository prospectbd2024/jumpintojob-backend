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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_plan_id')->nullable()->constrained('user_plans')->onDelete('NO ACTION');
            $table->string('user_type')->default('job_seeker');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('regions')->nullable();
            $table->string('ip')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('street')->nullable();
            $table->string('state_name')->nullable();
            $table->string('iso_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('zip_code')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('timezone')->nullable();
            $table->string('continent')->nullable();
            $table->string('currency')->nullable();
            $table->tinyInteger('banned')->default(0);
            $table->boolean('is_verified')->default(false);
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->string('new_email_verification_code')->nullable();
            $table->string('device_token')->nullable();
            $table->string('referral_code')->nullable();
            $table->json('social_profile')->nullable();
            $table->json('social_account')->nullable();
            $table->rememberToken();
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
