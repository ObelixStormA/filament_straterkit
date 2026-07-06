<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stat_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->integer('number_value');
            $table->string('suffix', 10)->nullable();
            $table->json('label');
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stat_numbers');
    }
};
