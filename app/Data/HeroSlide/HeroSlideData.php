<?php

declare(strict_types=1);

namespace App\Data\HeroSlide;

use Spatie\LaravelData\Data;

class HeroSlideData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $subtitle
     * @param  array<string, string>|null  $primary_button_text
     * @param  array<string, string>|null  $secondary_button_text
     */
    public function __construct(
        public string $background_type,
        public ?string $background_image,
        public ?string $background_video,
        public array $title,
        public ?array $subtitle,
        public ?string $primary_button_url,
        public ?array $primary_button_text,
        public ?string $secondary_button_url,
        public ?array $secondary_button_text,
        public bool $is_active,
    ) {}
}
