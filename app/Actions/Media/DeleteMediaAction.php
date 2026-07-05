<?php

declare(strict_types=1);

namespace App\Actions\Media;

use App\Models\MediaAsset;

class DeleteMediaAction
{
    public function handle(MediaAsset $asset): void
    {
        $asset->delete();
    }
}
