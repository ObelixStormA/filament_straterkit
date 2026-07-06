<?php

declare(strict_types=1);

namespace App\Actions\ContentBlock;

use App\Models\ContentBlock;

class DeleteContentBlockAction
{
    public function handle(ContentBlock $contentBlock): void
    {
        $contentBlock->delete();
    }
}
