<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('cover_image')->nullable();
            $table->unsignedSmallInteger('year');
            $table->string('issue_number')->nullable();
            $table->string('event_type')->nullable();
            $table->string('code_type')->nullable();
            $table->string('code_value')->nullable();
            $table->string('file_url')->nullable();
            $table->unsignedInteger('download_count')->default(0);
            $table->json('title');
            $table->json('description')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
