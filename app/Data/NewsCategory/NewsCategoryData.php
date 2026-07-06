<?php

declare(strict_types=1);

namespace App\Data\NewsCategory;

use Spatie\LaravelData\Data;

class NewsCategoryData extends Data
{
    /**
     * @param  array<string, string>  $name
     */
    public function __construct(
        public ?string $slug,
        public array $name,
    ) {}
}
