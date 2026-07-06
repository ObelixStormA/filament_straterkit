<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AboutSection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutSection>
 */
class AboutSectionFactory extends Factory
{
    protected $model = AboutSection::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => null,
            'title_html' => ['uz' => fake()->sentence(4)],
            'description' => ['uz' => fake()->paragraph()],
            'button_text' => ['uz' => fake()->words(2, true)],
        ];
    }
}
