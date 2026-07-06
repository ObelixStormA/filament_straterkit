<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StatNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StatNumber>
 */
class StatNumberFactory extends Factory
{
    protected $model = StatNumber::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => null,
            'number_value' => fake()->numberBetween(10, 1000),
            'suffix' => '+',
            'label' => ['uz' => fake()->words(2, true)],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
