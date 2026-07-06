<?php

declare(strict_types=1);

namespace App\Data\Partner;

use Spatie\LaravelData\Data;

class PartnerData extends Data
{
    public function __construct(
        public string $name,
        public ?string $logo,
        public ?string $website_url,
        public bool $is_active,
    ) {}
}
