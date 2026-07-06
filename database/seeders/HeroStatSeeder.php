<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\HeroStat;
use Illuminate\Database\Seeder;

class HeroStatSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['icon' => 'fa-graduation-cap', 'number_display' => '500+', 'label' => 'Bitiruvchi'],
            ['icon' => 'fa-book', 'number_display' => '12', 'label' => "Ta'lim yo'nalishi"],
            ['icon' => 'fa-university', 'number_display' => '30+', 'label' => 'Yillik tajriba'],
            ['icon' => 'fa-flask', 'number_display' => '8', 'label' => 'Ilmiy laboratoriya'],
        ];

        foreach ($stats as $order => $stat) {
            HeroStat::query()->updateOrCreate(
                ['number_display' => $stat['number_display'], 'icon' => $stat['icon']],
                [
                    'label' => ['uz' => $stat['label']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
