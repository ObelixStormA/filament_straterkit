<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['slug' => 'yangiliklar', 'name' => 'Yangiliklar'],
            ['slug' => 'elonlar', 'name' => "E'lonlar"],
            ['slug' => 'ilmiy-maqolalar', 'name' => 'Ilmiy maqolalar'],
        ];

        foreach ($categories as $order => $category) {
            NewsCategory::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => ['uz' => $category['name']],
                    'order' => $order,
                ],
            );
        }
    }
}
