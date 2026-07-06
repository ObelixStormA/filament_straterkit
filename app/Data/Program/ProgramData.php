<?php

declare(strict_types=1);

namespace App\Data\Program;

use Spatie\LaravelData\Data;

class ProgramData extends Data
{
    /**
     * @param  array<string, string>  $name
     * @param  array<string, string>|null  $short_description
     * @param  array<string, string>|null  $full_description
     */
    public function __construct(
        public ?string $slug,
        public ?string $icon,
        public ?string $image,
        public ?int $duration_years,
        public ?string $degree_type,
        public ?int $quota,
        public array $name,
        public ?array $short_description,
        public ?array $full_description,
        public bool $is_active,
    ) {}
}
