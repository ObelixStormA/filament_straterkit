<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'category_id' => null,
            'cover_image' => null,
            'is_research' => false,
            'is_featured' => false,
            'is_published' => true,
            'author_name' => fake()->name(),
            'author_id' => null,
            'external_link' => null,
            'file_url' => null,
            'views_count' => 0,
            'title' => ['uz' => fake()->sentence(6)],
            'short_description' => ['uz' => fake()->sentence()],
            'content_html' => ['uz' => fake()->paragraph()],
            'meta_title' => null,
            'meta_description' => null,
            'published_at' => now(),
        ];
    }
}
