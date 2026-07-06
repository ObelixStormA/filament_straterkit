<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_section', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->json('title_html');
            $table->json('description')->nullable();
            $table->json('button_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_section');
    }
};
