<?php

declare(strict_types=1);

namespace App\Data\ContentBlock;

use Spatie\LaravelData\Data;

class ContentBlockData extends Data
{
    /**
     * @param  array<string, string>|null  $title
     * @param  array<string, string>|null  $subtitle
     * @param  array<string, string>|null  $button_text
     */
    public function __construct(
        public string $block_key,
        public ?string $icon,
        public ?string $image,
        public ?string $button_url,
        public ?array $title,
        public ?array $subtitle,
        public ?array $button_text,
        public bool $is_active,
    ) {}
}
