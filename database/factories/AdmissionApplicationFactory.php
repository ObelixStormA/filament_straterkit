<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AdmissionApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdmissionApplication>
 */
class AdmissionApplicationFactory extends Factory
{
    protected $model = AdmissionApplication::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_year' => fake()->numberBetween(1998, 2008),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'program_id' => null,
            'message' => fake()->sentence(),
            'status' => 'new',
            'reviewed_by' => null,
            'reviewed_at' => null,
        ];
    }
}
