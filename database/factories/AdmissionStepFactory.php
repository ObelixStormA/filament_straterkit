<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AdmissionStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdmissionStep>
 */
class AdmissionStepFactory extends Factory
{
    protected $model = AdmissionStep::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'step_number' => fake()->numberBetween(1, 5),
            'icon' => null,
            'title' => ['uz' => fake()->words(3, true)],
            'description' => ['uz' => fake()->sentence()],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
