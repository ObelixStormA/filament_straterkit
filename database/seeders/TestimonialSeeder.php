<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'person_type' => 'graduate',
                'rating' => 5,
                'display_name' => 'Kapitan A. Yusupov',
                'quote_text' => "Institutda olgan bilim va amaliy ko'nikmalarim bugungi xizmatimda muhim tayanch bo'lib xizmat qilmoqda.",
            ],
            [
                'person_type' => 'teacher',
                'rating' => 4,
                'display_name' => 'professor N. Karimov',
                'quote_text' => 'Kursantlarimiz nafaqat nazariy bilim, balki zamonaviy laboratoriyalarda amaliy tajriba orttirib chiqishadi.',
            ],
            [
                'person_type' => 'graduate',
                'rating' => 5,
                'display_name' => 'leytenant D. Bekova',
                'quote_text' => "Institut menga vatanparvarlik ruhi va intizomni, shu bilan birga zamonaviy kasbiy ko'nikmalarni berdi.",
            ],
        ];

        foreach ($testimonials as $order => $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['order' => $order],
                [
                    'person_type' => $testimonial['person_type'],
                    'rating' => $testimonial['rating'],
                    'display_name' => ['uz' => $testimonial['display_name']],
                    'quote_text' => ['uz' => $testimonial['quote_text']],
                    'is_active' => true,
                ],
            );
        }
    }
}
