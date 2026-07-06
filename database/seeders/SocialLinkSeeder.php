<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $platforms = [
            ['platform' => 'telegram', 'icon' => 'fa-telegram', 'url' => 'https://t.me/aktva_instituti'],
            ['platform' => 'youtube', 'icon' => 'fa-youtube-play', 'url' => 'https://youtube.com/@aktva_instituti'],
            ['platform' => 'instagram', 'icon' => 'fa-instagram', 'url' => 'https://instagram.com/aktva_instituti'],
            ['platform' => 'facebook', 'icon' => 'fa-facebook', 'url' => 'https://facebook.com/aktva.instituti'],
        ];

        $locations = ['topbar', 'footer'];

        foreach ($locations as $location) {
            foreach ($platforms as $order => $platform) {
                SocialLink::query()->updateOrCreate(
                    ['platform' => $platform['platform'], 'display_location' => $location],
                    [
                        'icon' => $platform['icon'],
                        'url' => $platform['url'],
                        'order' => $order,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
