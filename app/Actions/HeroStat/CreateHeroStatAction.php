<?php

declare(strict_types=1);

namespace App\Actions\HeroStat;

use App\Data\HeroStat\HeroStatData;
use App\Models\HeroStat;

class CreateHeroStatAction
{
    public function handle(HeroStatData $data): HeroStat
    {
        $order = HeroStat::query()->max('order');

        return HeroStat::query()->create([
            'icon' => $data->icon,
            'number_display' => $data->number_display,
            'label' => $data->label,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
