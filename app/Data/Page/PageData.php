<?php

declare(strict_types=1);

namespace App\Data\Page;

use Spatie\LaravelData\Data;

class PageData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $content_html
     * @param  array<string, string>|null  $meta_title
     * @param  array<string, string>|null  $meta_description
     */
    public function __construct(
        public ?string $slug,
        public array $title,
        public ?array $content_html,
        public ?array $meta_title,
        public ?array $meta_description,
        public ?string $image,
        public bool $is_published,
        public ?string $published_at,
    ) {}
}
