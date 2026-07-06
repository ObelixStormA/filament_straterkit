<?php

declare(strict_types=1);

namespace App\Data\HeroStat;

use Spatie\LaravelData\Data;

class HeroStatData extends Data
{
    /**
     * @param  array<string, string>  $label
     */
    public function __construct(
        public ?string $icon,
        public string $number_display,
        public array $label,
        public bool $is_active,
    ) {}
}
