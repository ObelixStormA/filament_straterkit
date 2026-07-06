<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            "O'zbekiston Qurolli Kuchlari Bosh shtabi",
            'Milliy gvardiya',
            'Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi',
            'Toshkent axborot texnologiyalari universiteti',
        ];

        foreach ($partners as $order => $name) {
            Partner::query()->updateOrCreate(
                ['name' => $name],
                ['order' => $order, 'is_active' => true],
            );
        }
    }
}
