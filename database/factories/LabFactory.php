<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lab>
 */
class LabFactory extends Factory
{
    protected $model = Lab::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => null,
            'box_size' => 'normal',
            'title' => ['uz' => fake()->words(3, true)],
            'description' => ['uz' => fake()->sentence()],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
