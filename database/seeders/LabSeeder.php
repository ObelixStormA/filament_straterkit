<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    public function run(): void
    {
        $labs = [
            [
                'icon' => 'fa-shield',
                'box_size' => 'normal',
                'title' => 'Kibermudofaa laboratoriyasi',
                'description' => "Tarmoq hujumlarini aniqlash va bartaraf etish bo'yicha amaliy mashg'ulotlar.",
            ],
            [
                'icon' => 'fa-satellite',
                'box_size' => 'wide',
                'title' => 'Harbiy aloqa va simulyatsiya markazi',
                'description' => "Radio va raqamli aloqa tizimlarini modellashtirish, real vaqt rejimida signal uzatish sinovlari o'tkaziladigan zamonaviy markaz.",
            ],
            [
                'icon' => 'fa-bar-chart',
                'box_size' => 'normal',
                'title' => 'Statistik tahlil markazi',
                'description' => "Signallar va ma'lumotlarni tahlil qilish bo'yicha ilmiy izlanishlar.",
            ],
            [
                'icon' => 'fa-sitemap',
                'box_size' => 'wide',
                'title' => 'Tarmoq xavfsizligi laboratoriyasi',
                'description' => "Xavfsiz tarmoq infratuzilmalarini loyihalash va sinovdan o'tkazish bo'yicha amaliyot bazasi.",
            ],
            [
                'icon' => 'fa-code',
                'box_size' => 'wide',
                'title' => 'Dasturiy injiniring markazi',
                'description' => "Harbiy va maxsus tizimlar uchun dasturiy ta'minot ishlab chiqish bo'yicha loyihalar bajariladi.",
            ],
        ];

        foreach ($labs as $order => $lab) {
            Lab::query()->updateOrCreate(
                ['icon' => $lab['icon'], 'box_size' => $lab['box_size']],
                [
                    'title' => ['uz' => $lab['title']],
                    'description' => ['uz' => $lab['description']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
