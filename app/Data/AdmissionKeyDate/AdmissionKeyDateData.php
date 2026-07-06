<?php

declare(strict_types=1);

namespace App\Data\AdmissionKeyDate;

use Spatie\LaravelData\Data;

class AdmissionKeyDateData extends Data
{
    /**
     * @param  array<string, string>  $title
     */
    public function __construct(
        public ?string $date_start,
        public ?string $date_end,
        public array $title,
        public bool $is_active,
    ) {}
}
