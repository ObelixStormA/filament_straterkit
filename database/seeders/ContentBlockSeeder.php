<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ContentBlock;
use Illuminate\Database\Seeder;

class ContentBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'block_key' => 'section_yonalishlar_intro',
                'title' => "Ta'lim yo'nalishlari",
                'subtitle' => "Institutda axborot xavfsizligi, harbiy aloqa va raqamli texnologiyalar sohasida zamonaviy dasturlar asosida ta'lim beriladi.",
            ],
            [
                'block_key' => 'motto_banner',
                'title' => 'Intizom bilan bilim, vatanparvarlik bilan xizmat — AKTVA Instituti kelajak zobitlarini tayyorlaydi!',
            ],
            [
                'block_key' => 'section_ilmiy_faoliyat_intro',
                'title' => 'Ilmiy faoliyat — Laboratoriyalar',
                'subtitle' => 'Institut tarkibida amaliy va ilmiy-tadqiqot ishlarini olib borish uchun quyidagi laboratoriya va markazlar faoliyat yuritadi.',
            ],
            [
                'block_key' => 'section_qabul_intro',
                'title' => "Qabul bo'limi",
                'subtitle' => 'Institutga qabul quyidagi bosqichlar asosida amalga oshiriladi.',
            ],
            [
                'block_key' => 'section_kursantlarga_intro',
                'title' => "Bitiruvchilar va o'qituvchilar fikri",
                'subtitle' => "Institutni tugatgan zobitlar va professor-o'qituvchilar tarkibining fikr-mulohazalari.",
            ],
            [
                'block_key' => 'section_news_intro',
                'title' => "Yangiliklar va e'lonlar",
                'subtitle' => 'Institut hayotidagi so\'nggi voqealar, tadbirlar va rasmiy e\'lonlar.',
            ],
            [
                'block_key' => 'section_research_intro',
                'title' => "So'nggi ilmiy ishlar",
                'subtitle' => "Institut professor-o'qituvchilari va ilmiy izlanuvchilarining so'nggi nashr etilgan ishlari.",
            ],
            [
                'block_key' => 'scholarship_callout',
                'icon' => 'fa-shield',
                'title' => 'Stipendiya va ijtimoiy kafolatlar',
                'subtitle' => "Barcha kursantlar davlat ta'minotida bo'lib, oylik stipendiya, kiyim-kechak, ovqatlanish va yotoqxona bilan ta'minlanadi.",
            ],
            [
                'block_key' => 'announcements_box',
                'title' => "E'lonlar",
            ],
        ];

        foreach ($blocks as $block) {
            ContentBlock::query()->updateOrCreate(
                ['block_key' => $block['block_key']],
                [
                    'icon' => $block['icon'] ?? null,
                    'title' => ['uz' => $block['title']],
                    'subtitle' => isset($block['subtitle']) ? ['uz' => $block['subtitle']] : null,
                    'is_active' => true,
                ],
            );
        }
    }
}
