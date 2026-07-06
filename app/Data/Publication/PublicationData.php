<?php

declare(strict_types=1);

namespace App\Data\Publication;

use Spatie\LaravelData\Data;

class PublicationData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $description
     */
    public function __construct(
        public string $type,
        public ?string $cover_image,
        public int $year,
        public ?string $issue_number,
        public ?string $event_type,
        public ?string $code_type,
        public ?string $code_value,
        public ?string $file_url,
        public array $title,
        public ?array $description,
        public bool $is_published,
    ) {}
}
