<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('template_id');
            $table->string('cv_link');
            $table->string('title');
            $table->string('summary');
            $table->boolean('visibility_status')->comment('0: private, 1: public')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
