<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'icon' => 'fa-lock',
                'name' => 'Axborot xavfsizligi',
                'short_description' => 'Kibermudofaa, shifrlash va tarmoq himoyasi asoslari.',
            ],
            [
                'icon' => 'fa-wifi',
                'name' => 'Harbiy aloqa tizimlari',
                'short_description' => "Radio, raqamli va sun'iy yo'ldosh aloqasi.",
            ],
            [
                'icon' => 'fa-code',
                'name' => 'Amaliy dasturlash',
                'short_description' => "Harbiy tizimlar uchun dasturiy ta'minot ishlab chiqish.",
            ],
            [
                'icon' => 'fa-search',
                'name' => 'Razvedka va monitoring',
                'short_description' => 'Signallarni tahlil qilish va OSINT usullari.',
            ],
            [
                'icon' => 'fa-sitemap',
                'name' => 'Tarmoq infratuzilmasi',
                'short_description' => 'VPN va xavfsiz tarmoqlarni loyihalash.',
            ],
            [
                'icon' => 'fa-key',
                'name' => 'Raqamli kriptografiya',
                'short_description' => 'Shifrlash algoritmlari, ERI va blockchain asoslari.',
            ],
        ];

        foreach ($programs as $order => $program) {
            Program::query()->updateOrCreate(
                ['slug' => Str::slug($program['name'])],
                [
                    'icon' => $program['icon'],
                    'name' => ['uz' => $program['name']],
                    'short_description' => ['uz' => $program['short_description']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
