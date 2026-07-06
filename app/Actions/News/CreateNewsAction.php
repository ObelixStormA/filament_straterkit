<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Data\News\NewsData;
use App\Models\News;

class CreateNewsAction
{
    public function handle(NewsData $data): News
    {
        return News::query()->create([
            'slug' => $data->slug,
            'category_id' => $data->category_id,
            'cover_image' => $data->cover_image,
            'is_research' => $data->is_research,
            'is_featured' => $data->is_featured,
            'is_published' => $data->is_published,
            'author_name' => $data->author_name,
            'author_id' => $data->author_id,
            'external_link' => $data->external_link,
            'file_url' => $data->file_url,
            'title' => $data->title,
            'short_description' => $data->short_description,
            'content_html' => $data->content_html,
            'meta_title' => $data->meta_title,
            'meta_description' => $data->meta_description,
            'published_at' => $data->published_at,
        ]);
    }
}
