<?php

declare(strict_types=1);

namespace App\Data\Media;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class MediaAssetData extends Data
{
    public function __construct(
        public string $name,
        public UploadedFile|string $file,
    ) {}
}
