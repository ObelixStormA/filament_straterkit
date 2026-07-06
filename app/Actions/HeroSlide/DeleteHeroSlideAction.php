<?php

declare(strict_types=1);

namespace App\Actions\HeroSlide;

use App\Models\HeroSlide;

class DeleteHeroSlideAction
{
    public function handle(HeroSlide $heroSlide): void
    {
        $heroSlide->delete();
    }
}
