<?php

declare(strict_types=1);

namespace App\Actions\HeroStat;

use App\Data\HeroStat\HeroStatData;
use App\Models\HeroStat;

class UpdateHeroStatAction
{
    public function handle(HeroStat $heroStat, HeroStatData $data): HeroStat
    {
        $heroStat->update([
            'icon' => $data->icon,
            'number_display' => $data->number_display,
            'label' => $data->label,
            'is_active' => $data->is_active,
        ]);

        return $heroStat;
    }
}
