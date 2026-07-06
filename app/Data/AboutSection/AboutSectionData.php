<?php

declare(strict_types=1);

namespace App\Data\AboutSection;

use Spatie\LaravelData\Data;

class AboutSectionData extends Data
{
    /**
     * @param  array<string, string>  $title_html
     * @param  array<string, string>|null  $description
     * @param  array<string, string>|null  $button_text
     */
    public function __construct(
        public ?string $image,
        public array $title_html,
        public ?array $description,
        public ?array $button_text,
    ) {}
}
