<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AdmissionKeyDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdmissionKeyDate>
 */
class AdmissionKeyDateFactory extends Factory
{
    protected $model = AdmissionKeyDate::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_start' => now()->addMonth()->toDateString(),
            'date_end' => now()->addMonths(2)->toDateString(),
            'title' => ['uz' => fake()->sentence(3)],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
