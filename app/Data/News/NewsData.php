<?php

declare(strict_types=1);

namespace App\Data\News;

use Spatie\LaravelData\Data;

class NewsData extends Data
{
    /**
     * @param  array<string, string>  $title
     * @param  array<string, string>|null  $short_description
     * @param  array<string, string>|null  $content_html
     * @param  array<string, string>|null  $meta_title
     * @param  array<string, string>|null  $meta_description
     */
    public function __construct(
        public ?string $slug,
        public ?int $category_id,
        public ?string $cover_image,
        public bool $is_research,
        public bool $is_featured,
        public bool $is_published,
        public ?string $author_name,
        public ?int $author_id,
        public ?string $external_link,
        public ?string $file_url,
        public array $title,
        public ?array $short_description,
        public ?array $content_html,
        public ?array $meta_title,
        public ?array $meta_description,
        public ?string $published_at,
    ) {}
}
