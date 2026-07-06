<?php

declare(strict_types=1);

namespace App\Actions\Page;

use App\Data\Page\PageData;
use App\Models\Page;

class CreatePageAction
{
    public function handle(PageData $data): Page
    {
        return Page::query()->create([
            'slug' => $data->slug,
            'title' => $data->title,
            'content_html' => $data->content_html,
            'meta_title' => $data->meta_title,
            'meta_description' => $data->meta_description,
            'image' => $data->image,
            'is_published' => $data->is_published,
            'published_at' => $data->published_at,
        ]);
    }
}
