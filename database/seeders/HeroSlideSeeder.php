<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        HeroSlide::query()->updateOrCreate(
            ['order' => 0],
            [
                'background_type' => 'image',
                'title' => ['uz' => 'Vatanparvar Kadrlar — Raqamli Mudofaa Poydevori'],
                'subtitle' => [
                    'uz' => "Axborot kommunikatsiya texnologiyalari va harbiy aloqa sohasida oliy bilim beruvchi harbiy ta'lim muassasasi",
                ],
                'primary_button_url' => '#qabul',
                'primary_button_text' => ['uz' => 'Qabul hujjatlari'],
                'secondary_button_url' => '#about',
                'secondary_button_text' => ['uz' => "Institut haqida ko'proq"],
                'is_active' => true,
            ],
        );
    }
}
