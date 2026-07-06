<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SocialLink>
 */
class SocialLinkFactory extends Factory
{
    protected $model = SocialLink::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform' => 'telegram',
            'icon' => null,
            'url' => fake()->url(),
            'display_location' => 'footer',
            'order' => 0,
            'is_active' => true,
        ];
    }
}
