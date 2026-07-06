<?php

declare(strict_types=1);

namespace App\Data\SiteSetting;

use Spatie\LaravelData\Data;

class SiteSettingData extends Data
{
    /**
     * @param  array<string, string>  $site_name
     * @param  array<string, string>|null  $site_short_name
     * @param  array<string, string>|null  $address
     * @param  array<string, string>|null  $footer_description
     * @param  array<string, string>|null  $meta_description
     * @param  array<string, string>|null  $meta_keywords
     */
    public function __construct(
        public array $site_name,
        public ?array $site_short_name,
        public ?array $address,
        public ?array $footer_description,
        public ?array $meta_description,
        public ?array $meta_keywords,
        public ?string $phone_primary,
        public ?string $phone_fax,
        public ?string $email_primary,
        public ?float $map_latitude,
        public ?float $map_longitude,
        public ?string $map_embed_url,
        public ?int $founding_year,
        public ?string $theme_color_primary,
        public ?string $theme_color_secondary,
        public ?string $theme_color_accent,
        public ?string $font_heading,
        public ?string $font_body,
        public ?string $site_logo,
        public ?string $site_favicon,
    ) {}
}
