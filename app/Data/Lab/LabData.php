<?php

declare(strict_types=1);

namespace App\Data\Lab;

use Spatie\LaravelData\Data;

class LabData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $description
     */
    public function __construct(
        public ?string $icon,
        public string $box_size,
        public array $title,
        public ?array $description,
        public bool $is_active,
    ) {}
}
