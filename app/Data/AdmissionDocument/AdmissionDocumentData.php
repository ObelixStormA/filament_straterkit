<?php

declare(strict_types=1);

namespace App\Data\AdmissionDocument;

use Spatie\LaravelData\Data;

class AdmissionDocumentData extends Data
{
    /**
     * @param  array<string, string>  $name
     */
    public function __construct(
        public ?string $file_template_url,
        public array $name,
        public bool $is_active,
    ) {}
}
