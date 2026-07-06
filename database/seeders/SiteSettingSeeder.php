<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $setting = SiteSetting::current();

        $setting->update([
            'site_name' => [
                'uz' => 'Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti',
                'ru' => 'Институт Информационно-Коммуникационных Технологий и Военной Связи',
            ],
            'site_short_name' => ['uz' => 'AKTVA Instituti', 'ru' => 'Институт АКТВА'],
            'address' => ['uz' => 'Toshkent viloyati, Zangiota tumani, Quyoshli MFY'],
            'footer_description' => [
                'uz' => "Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti — O'zbekiston Qurolli Kuchlari uchun raqamli mudofaa sohasida zobit kadrlar tayyorlovchi harbiy oliy ta'lim muassasasi.",
            ],
            'meta_description' => [
                'uz' => "Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti — O'zbekiston Qurolli Kuchlari uchun kibermudofaa, harbiy aloqa va raqamli texnologiyalar sohasida zobit kadrlar tayyorlovchi harbiy oliy ta'lim muassasasi.",
            ],
            'meta_keywords' => ['uz' => "harbiy institut, harbiy aloqa, axborot xavfsizligi, kibermudofaa, O'zbekiston, qabul"],
            'phone_primary' => '+998 71 200 00 00',
            'phone_fax' => '+998 71 200 00 01',
            'email_primary' => 'info@aktva.uz',
            'map_latitude' => 41.2091417,
            'map_longitude' => 69.1374836,
            'map_embed_url' => 'https://yandex.uz/map-widget/v1/?ll=69.1374836%2C41.2091417&z=16&l=map&pt=69.1374836,41.2091417,pm2rdm',
            'founding_year' => 1994,
            'theme_color_primary' => '#1B3A2D',
            'theme_color_secondary' => '#2E5E45',
            'theme_color_accent' => '#C8A84B',
            'font_heading' => 'Playfair Display',
            'font_body' => 'Inter',
        ]);
    }
}
