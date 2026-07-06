<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'title' => ['uz' => fake()->sentence(3)],
            'content_html' => ['uz' => fake()->paragraph()],
            'meta_title' => null,
            'meta_description' => null,
            'image' => null,
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}
