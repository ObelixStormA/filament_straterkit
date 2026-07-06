<?php

declare(strict_types=1);

namespace App\Data\Testimonial;

use Spatie\LaravelData\Data;

class TestimonialData extends Data
{
    /**
     * @param  array<string, string>  $display_name
     * @param  array<string, string>|null  $quote_text
     */
    public function __construct(
        public ?string $photo,
        public string $person_type,
        public int $rating,
        public array $display_name,
        public ?array $quote_text,
        public bool $is_active,
    ) {}
}
