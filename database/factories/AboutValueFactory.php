<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AboutValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutValue>
 */
class AboutValueFactory extends Factory
{
    protected $model = AboutValue::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => null,
            'title' => ['uz' => fake()->words(2, true)],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
