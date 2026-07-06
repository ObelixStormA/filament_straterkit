<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AboutValue;
use Illuminate\Database\Seeder;

class AboutValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            ['icon' => 'fa-shield', 'title' => 'Intizom va vatanparvarlik'],
            ['icon' => 'fa-microchip', 'title' => 'Zamonaviy texnologiyalar'],
            ['icon' => 'fa-crosshairs', 'title' => "Amaliy ko'nikmalar"],
            ['icon' => 'fa-users', 'title' => 'Jamoaviy ruh'],
        ];

        foreach ($values as $order => $value) {
            AboutValue::query()->updateOrCreate(
                ['icon' => $value['icon']],
                [
                    'title' => ['uz' => $value['title']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
