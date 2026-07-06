<?php

declare(strict_types=1);

namespace App\Data\AdmissionStep;

use Spatie\LaravelData\Data;

class AdmissionStepData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $description
     */
    public function __construct(
        public int $step_number,
        public ?string $icon,
        public array $title,
        public ?array $description,
        public bool $is_active,
    ) {}
}
