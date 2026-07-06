<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ContentBlock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContentBlock>
 */
class ContentBlockFactory extends Factory
{
    protected $model = ContentBlock::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'block_key' => fake()->unique()->slug(2),
            'icon' => null,
            'image' => null,
            'button_url' => null,
            'title' => ['uz' => fake()->sentence(3)],
            'subtitle' => null,
            'button_text' => null,
            'is_active' => true,
        ];
    }
}
