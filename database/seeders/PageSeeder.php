<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'nizom',
                'title' => 'Institut Nizomi',
                'content_html' => "<p>Institut Nizomi O'zbekiston Respublikasi qonunchiligiga muvofiq tasdiqlangan bo'lib, institutning maqsad va vazifalarini, boshqaruv tuzilmasini belgilaydi.</p>",
            ],
            [
                'slug' => 'litsenziya',
                'title' => 'Litsenziya',
                'content_html' => "<p>Institut ta'lim faoliyatini amalga oshirish uchun belgilangan tartibda litsenziyaga ega.</p>",
            ],
            [
                'slug' => 'kadrlar-bolimi',
                'title' => "Kadrlar bo'limi",
                'content_html' => "<p>Kadrlar bo'limi institutning professor-o'qituvchilar va xodimlar tarkibi bilan bog'liq masalalarni yurgizadi.</p>",
            ],
        ];

        foreach ($pages as $page) {
            Page::query()->updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => ['uz' => $page['title']],
                    'content_html' => ['uz' => $page['content_html']],
                    'is_published' => true,
                    'published_at' => now(),
                ],
            );
        }
    }
}
