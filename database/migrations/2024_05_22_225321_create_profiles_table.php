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
        Schema::connection('mongodb')->create('profiles', function (Blueprint $collection) {
            $collection->id();
            $collection->index('user_id');
            $collection->string('personal_information');
            $collection->json('experience');
            $collection->json('education');
            $collection->json('skills');
            $collection->json('languages');
            $collection->json('hobbies');
            $collection->json('others');
            $collection->timestamps();
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
