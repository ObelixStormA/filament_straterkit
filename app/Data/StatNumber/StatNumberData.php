<?php

declare(strict_types=1);

namespace App\Data\StatNumber;

use Spatie\LaravelData\Data;

class StatNumberData extends Data
{
    /**
     * @param  array<string, string>  $label
     */
    public function __construct(
        public ?string $icon,
        public int $number_value,
        public ?string $suffix,
        public array $label,
        public bool $is_active,
    ) {}
}
