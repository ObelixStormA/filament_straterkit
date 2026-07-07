<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $topLevel = [
            [
                'label' => ['uz' => 'Bosh sahifa', 'ru' => 'Главная', 'en' => 'Home'],
                'route_name' => 'home',
                'section_anchor' => null,
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Institut haqida', 'ru' => 'Об институте', 'en' => 'About the Institute'],
                'route_name' => 'home',
                'section_anchor' => 'about',
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => "Ta'lim yo'nalishlari", 'ru' => 'Направления обучения', 'en' => 'Study Programs'],
                'route_name' => 'home',
                'section_anchor' => 'yonalishlar',
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Kursantlarga', 'ru' => 'Курсантам', 'en' => 'For Cadets'],
                'route_name' => 'home',
                'section_anchor' => 'kursantlarga',
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Ilmiy faoliyat', 'ru' => 'Научная деятельность', 'en' => 'Research Activity'],
                'route_name' => 'home',
                'section_anchor' => 'ilmiy-faoliyat',
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Ilmiy jurnallar', 'ru' => 'Научные журналы', 'en' => 'Scientific Journals'],
                'route_name' => null,
                'section_anchor' => null,
                'link_type' => 'url',
            ],
            [
                'label' => ['uz' => 'Qabul', 'ru' => 'Приём', 'en' => 'Admissions'],
                'route_name' => 'home',
                'section_anchor' => 'qabul',
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Yangiliklar', 'ru' => 'Новости', 'en' => 'News'],
                'route_name' => 'news.index',
                'section_anchor' => null,
                'link_type' => 'route',
            ],
            [
                'label' => ['uz' => 'Aloqa', 'ru' => 'Контакты', 'en' => 'Contact'],
                'route_name' => 'contact',
                'section_anchor' => null,
                'link_type' => 'route',
            ],
        ];

        $children = [
            'Ilmiy jurnallar' => [
                [
                    'label' => ['uz' => 'Jurnallar', 'ru' => 'Журналы', 'en' => 'Journals'],
                    'route_name' => 'publications.journals',
                ],
                [
                    'label' => ['uz' => "To'plamlar", 'ru' => 'Сборники', 'en' => 'Collections'],
                    'route_name' => 'publications.collections',
                ],
            ],
        ];

        foreach ($topLevel as $order => $data) {
            $menu = Menu::query()->updateOrCreate(
                [
                    'location' => 'header',
                    'parent_id' => null,
                    'route_name' => $data['route_name'],
                    'section_anchor' => $data['section_anchor'],
                ],
                [
                    'label' => $data['label'],
                    'link_type' => $data['link_type'],
                    'order' => $order,
                    'is_active' => true,
                ],
            );

            foreach ($children[$data['label']['uz']] ?? [] as $childOrder => $child) {
                Menu::query()->updateOrCreate(
                    [
                        'location' => 'header',
                        'parent_id' => $menu->id,
                        'route_name' => $child['route_name'],
                    ],
                    [
                        'label' => $child['label'],
                        'link_type' => 'route',
                        'order' => $childOrder,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
