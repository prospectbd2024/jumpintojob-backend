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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique(); // Adjust the size (255) as needed
            $table->string('email', 255)->unique(); // Adjust the size (255) as needed
            $table->string('phone', 255)->unique()->nullable(); // Assuming phone numbers, adjust the size as needed
            $table->text('logo')->nullable();
            $table->integer('size')->default(0);
            $table->string('category_id')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->text('company_type');
            $table->string('slug')->unique();
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
