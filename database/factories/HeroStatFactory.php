<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HeroStat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroStat>
 */
class HeroStatFactory extends Factory
{
    protected $model = HeroStat::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => null,
            'number_display' => '100+',
            'label' => ['uz' => fake()->words(2, true)],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
