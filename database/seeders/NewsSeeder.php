<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsCategoryId = NewsCategory::query()->where('slug', 'yangiliklar')->value('id');
        $researchCategoryId = NewsCategory::query()->where('slug', 'ilmiy-maqolalar')->value('id');

        $news = [
            [
                'title' => 'Yangi o\'quv yili boshlandi',
                'short_description' => "Institutda 2026-2027 o'quv yili tantanali marosim bilan boshlandi.",
                'content_html' => "<p>Institutda 2026-2027 o'quv yili tantanali marosim bilan boshlandi. Marosimda institut rahbariyati, professor-o'qituvchilar tarkibi va yangi qabul qilingan kursantlar ishtirok etdi.</p>",
                'category_id' => $newsCategoryId,
                'is_research' => false,
                'is_featured' => true,
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Kibermudofaa bo\'yicha xalqaro seminar',
                'short_description' => 'Institut hamkor tashkilotlar bilan birgalikda seminar tashkil etdi.',
                'content_html' => '<p>Institut hamkor tashkilotlar bilan birgalikda kibermudofaa mavzusidagi xalqaro seminarni tashkil etdi. Tadbirda xorijlik va mahalliy mutaxassislar ishtirok etdi.</p>',
                'category_id' => $newsCategoryId,
                'is_research' => false,
                'is_featured' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Bitiruvchilarga zobit unvoni topshirildi',
                'short_description' => 'Ushbu yilgi bitiruvchilarga tantanali ravishda unvon va diplomlar topshirildi.',
                'content_html' => '<p>Ushbu yilgi bitiruvchilarga tantanali marosimda zobit unvoni va diplomlar topshirildi. Marosimda institut rahbariyati bitiruvchilarni tabrikladi.</p>',
                'category_id' => $newsCategoryId,
                'is_research' => false,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Harbiy aloqa tarmoqlarida signal xavfsizligini oshirish usullari',
                'short_description' => 'Ilmiy maqola, 2026-yil nashri.',
                'content_html' => '<p>Ushbu ilmiy maqolada harbiy aloqa tarmoqlarida signal xavfsizligini oshirishning zamonaviy usullari tahlil qilingan.</p>',
                'category_id' => $researchCategoryId,
                'is_research' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Raqamli kriptografiyada zamonaviy shifrlash algoritmlari',
                'short_description' => 'Ilmiy maqola, 2026-yil nashri.',
                'content_html' => '<p>Maqolada zamonaviy shifrlash algoritmlari va ularning harbiy aloqa tizimlaridagi qo\'llanilishi yoritilgan.</p>',
                'category_id' => $researchCategoryId,
                'is_research' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'OSINT usullari asosida signal monitoringi',
                'short_description' => 'Ilmiy maqola, 2025-yil nashri.',
                'content_html' => '<p>Ushbu tadqiqotda OSINT (Open Source Intelligence) usullari asosida signal monitoringi masalalari o\'rganilgan.</p>',
                'category_id' => $researchCategoryId,
                'is_research' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(60),
            ],
        ];

        foreach ($news as $item) {
            News::query()->updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'category_id' => $item['category_id'],
                    'is_research' => $item['is_research'],
                    'is_featured' => $item['is_featured'],
                    'is_published' => true,
                    'title' => ['uz' => $item['title']],
                    'short_description' => ['uz' => $item['short_description']],
                    'content_html' => ['uz' => $item['content_html']],
                    'published_at' => $item['published_at'],
                ],
            );
        }
    }
}
