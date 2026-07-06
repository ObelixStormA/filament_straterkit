<?php

declare(strict_types=1);

namespace App\Actions\NewsCategory;

use App\Data\NewsCategory\NewsCategoryData;
use App\Models\NewsCategory;

class UpdateNewsCategoryAction
{
    public function handle(NewsCategory $newsCategory, NewsCategoryData $data): NewsCategory
    {
        $newsCategory->update([
            'slug' => $data->slug,
            'name' => $data->name,
        ]);

        return $newsCategory;
    }
}
