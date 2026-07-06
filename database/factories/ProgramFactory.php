<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Program>
 */
class ProgramFactory extends Factory
{
    protected $model = Program::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'icon' => null,
            'image' => null,
            'duration_years' => 4,
            'degree_type' => 'bakalavr',
            'quota' => 50,
            'name' => ['uz' => fake()->words(3, true)],
            'short_description' => ['uz' => fake()->sentence()],
            'full_description' => ['uz' => fake()->paragraph()],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
