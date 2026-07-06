<?php

declare(strict_types=1);

namespace App\Actions\ContentBlock;

use App\Data\ContentBlock\ContentBlockData;
use App\Models\ContentBlock;

class UpdateContentBlockAction
{
    public function handle(ContentBlock $contentBlock, ContentBlockData $data): ContentBlock
    {
        $contentBlock->update([
            'block_key' => $data->block_key,
            'icon' => $data->icon,
            'image' => $data->image,
            'button_url' => $data->button_url,
            'title' => $data->title,
            'subtitle' => $data->subtitle,
            'button_text' => $data->button_text,
            'is_active' => $data->is_active,
        ]);

        return $contentBlock;
    }
}
