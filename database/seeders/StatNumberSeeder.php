<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\StatNumber;
use Illuminate\Database\Seeder;

class StatNumberSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['icon' => 'fa-university', 'number_value' => 1994, 'suffix' => null, 'label' => 'Tashkil etilgan yil'],
            ['icon' => 'fa-graduation-cap', 'number_value' => 500, 'suffix' => '+', 'label' => 'Bitiruvchilar'],
            ['icon' => 'fa-user', 'number_value' => 45, 'suffix' => null, 'label' => "O'qituvchi-professor"],
            ['icon' => 'fa-percent', 'number_value' => 98, 'suffix' => '%', 'label' => 'Ishga joylashish'],
        ];

        foreach ($stats as $order => $stat) {
            StatNumber::query()->updateOrCreate(
                ['icon' => $stat['icon']],
                [
                    'number_value' => $stat['number_value'],
                    'suffix' => $stat['suffix'],
                    'label' => ['uz' => $stat['label']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
