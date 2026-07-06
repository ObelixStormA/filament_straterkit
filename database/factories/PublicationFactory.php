<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Publication>
 */
class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'journal',
            'cover_image' => null,
            'year' => (int) date('Y'),
            'issue_number' => '1-son',
            'event_type' => null,
            'code_type' => 'ISSN',
            'code_value' => '2181-0000',
            'file_url' => null,
            'download_count' => 0,
            'title' => ['uz' => fake()->sentence(4)],
            'description' => ['uz' => fake()->sentence()],
            'order' => 0,
            'is_published' => true,
        ];
    }
}
