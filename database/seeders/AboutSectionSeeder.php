<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        $aboutSection = AboutSection::current();

        $aboutSection->update([
            'title_html' => [
                'uz' => "Institut O'zbekiston <mark>Qurolli Kuchlari</mark> tarkibida faoliyat yurituvchi harbiy oliy ta'lim muassasasidir",
            ],
            'description' => [
                'uz' => "Institut axborot kommunikatsiya texnologiyalari, kibermudofaa, harbiy aloqa tizimlari va raqamli razvedka yo'nalishlarida malakali zobit kadrlar tayyorlaydi. Ta'lim jarayoni zamonaviy texnik bazasi va tajribali professor-o'qituvchilar tarkibi asosida tashkil etilgan.",
            ],
            'button_text' => ['uz' => "Ta'lim yo'nalishlari bilan tanishish"],
        ]);
    }
}
