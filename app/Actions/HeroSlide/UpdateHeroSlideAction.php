<?php

declare(strict_types=1);

namespace App\Actions\HeroSlide;

use App\Data\HeroSlide\HeroSlideData;
use App\Models\HeroSlide;

class UpdateHeroSlideAction
{
    public function handle(HeroSlide $heroSlide, HeroSlideData $data): HeroSlide
    {
        $heroSlide->update([
            'background_type' => $data->background_type,
            'background_image' => $data->background_image,
            'background_video' => $data->background_video,
            'title' => $data->title,
            'subtitle' => $data->subtitle,
            'primary_button_url' => $data->primary_button_url,
            'primary_button_text' => $data->primary_button_text,
            'secondary_button_url' => $data->secondary_button_url,
            'secondary_button_text' => $data->secondary_button_text,
            'is_active' => $data->is_active,
        ]);

        return $heroSlide;
    }
}
