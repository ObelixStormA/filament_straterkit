<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SiteSetting>
 */
class SiteSettingFactory extends Factory
{
    protected $model = SiteSetting::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_name' => ['uz' => fake()->company()],
            'site_short_name' => ['uz' => fake()->companySuffix()],
            'address' => ['uz' => fake()->address()],
            'footer_description' => ['uz' => fake()->sentence()],
            'meta_description' => null,
            'meta_keywords' => null,
            'phone_primary' => fake()->phoneNumber(),
            'phone_fax' => null,
            'email_primary' => fake()->safeEmail(),
            'map_latitude' => null,
            'map_longitude' => null,
            'map_embed_url' => null,
            'founding_year' => 1994,
            'theme_color_primary' => '#1B3A2D',
            'theme_color_secondary' => '#2E5E45',
            'theme_color_accent' => '#C8A84B',
            'font_heading' => 'Playfair Display',
            'font_body' => 'Inter',
            'site_logo' => null,
            'site_favicon' => null,
        ];
    }
}
