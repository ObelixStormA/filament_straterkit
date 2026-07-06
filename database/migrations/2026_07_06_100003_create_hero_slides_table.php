<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('background_type')->default('image');
            $table->string('background_image')->nullable();
            $table->string('background_video')->nullable();
            $table->json('title');
            $table->json('subtitle')->nullable();
            $table->string('primary_button_url')->nullable();
            $table->json('primary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();
            $table->json('secondary_button_text')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
