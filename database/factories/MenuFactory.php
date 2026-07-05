<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    protected $model = Menu::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'label' => ['en' => fake()->words(2, true)],
            'url' => null,
            'route_name' => null,
            'icon' => null,
            'permission_name' => null,
            'order' => 0,
            'is_active' => true,
        ];
    }
}
