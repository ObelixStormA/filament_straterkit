<?php

declare(strict_types=1);

namespace App\Data\Menu;

use Spatie\LaravelData\Data;

class MenuData extends Data
{
    /**
     * @param  array<string, string>  $label
     */
    public function __construct(
        public ?int $parent_id,
        public array $label,
        public ?string $url,
        public ?string $route_name,
        public ?string $icon,
        public ?string $permission_name,
        public bool $is_active,
        public string $link_type = 'url',
        public string $location = 'header',
        public ?int $page_id = null,
        public ?string $section_anchor = null,
        public bool $open_in_new_tab = false,
    ) {}
}
