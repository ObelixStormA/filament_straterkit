<?php

declare(strict_types=1);

namespace App\Data\AboutValue;

use Spatie\LaravelData\Data;

class AboutValueData extends Data
{
    /**
     * @param  array<string, string>  $title
     */
    public function __construct(
        public ?string $icon,
        public array $title,
        public bool $is_active,
    ) {}
}
