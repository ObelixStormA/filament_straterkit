<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HeroSlide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroSlide>
 */
class HeroSlideFactory extends Factory
{
    protected $model = HeroSlide::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'background_type' => 'image',
            'background_image' => null,
            'background_video' => null,
            'title' => ['uz' => fake()->sentence(4)],
            'subtitle' => ['uz' => fake()->sentence(6)],
            'primary_button_url' => null,
            'primary_button_text' => ['uz' => fake()->words(2, true)],
            'secondary_button_url' => null,
            'secondary_button_text' => null,
            'order' => 0,
            'is_active' => true,
        ];
    }
}
