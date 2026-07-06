<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->json('site_name');
            $table->json('site_short_name')->nullable();
            $table->json('address')->nullable();
            $table->json('footer_description')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('phone_fax')->nullable();
            $table->string('email_primary')->nullable();
            $table->decimal('map_latitude', 10, 7)->nullable();
            $table->decimal('map_longitude', 10, 7)->nullable();
            $table->string('map_embed_url')->nullable();
            $table->unsignedSmallInteger('founding_year')->nullable();
            $table->string('theme_color_primary')->nullable();
            $table->string('theme_color_secondary')->nullable();
            $table->string('theme_color_accent')->nullable();
            $table->string('font_heading')->nullable();
            $table->string('font_body')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
