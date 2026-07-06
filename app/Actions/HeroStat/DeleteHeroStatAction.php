<?php

declare(strict_types=1);

namespace App\Actions\HeroStat;

use App\Models\HeroStat;

class DeleteHeroStatAction
{
    public function handle(HeroStat $heroStat): void
    {
        $heroStat->delete();
    }
}
