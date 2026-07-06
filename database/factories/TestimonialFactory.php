<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => null,
            'person_type' => 'graduate',
            'rating' => 5,
            'display_name' => ['uz' => fake()->name()],
            'quote_text' => ['uz' => fake()->sentence()],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
