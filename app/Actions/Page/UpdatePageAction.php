<?php

declare(strict_types=1);

namespace App\Actions\Page;

use App\Data\Page\PageData;
use App\Models\Page;

class UpdatePageAction
{
    public function handle(Page $page, PageData $data): Page
    {
        $page->update([
            'slug' => $data->slug,
            'title' => $data->title,
            'content_html' => $data->content_html,
            'meta_title' => $data->meta_title,
            'meta_description' => $data->meta_description,
            'image' => $data->image,
            'is_published' => $data->is_published,
            'published_at' => $data->published_at,
        ]);

        return $page;
    }
}
