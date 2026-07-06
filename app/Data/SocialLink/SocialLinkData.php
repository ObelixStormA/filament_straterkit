<?php

declare(strict_types=1);

namespace App\Data\SocialLink;

use Spatie\LaravelData\Data;

class SocialLinkData extends Data
{
    public function __construct(
        public string $platform,
        public ?string $icon,
        public string $url,
        public string $display_location,
        public bool $is_active,
    ) {}
}
