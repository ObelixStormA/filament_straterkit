<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('block_key')->unique();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('button_url')->nullable();
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('button_text')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_blocks');
    }
};
