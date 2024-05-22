<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // create schema for mongodb connection
        Schema::connection('mongodb')->create('resumes', function (Blueprint $collection) {
            $collection->id();
            $collection->string('name');
            $collection->string('email');
            $collection->string('phone');
            $collection->string('address');
            $collection->string('city');
            $collection->string('state');
            $collection->string('zip');
            $collection->string('country');
            $collection->string('objective');
            $collection->json('experience');
            $collection->json('education');
            $collection->json('skills');
            $collection->json('languages');
            $collection->json('hobbies');
            $collection->json('references');
            $collection->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
