<?php

declare(strict_types=1);

namespace App\Actions\NewsCategory;

use App\Data\NewsCategory\NewsCategoryData;
use App\Models\NewsCategory;

class CreateNewsCategoryAction
{
    public function handle(NewsCategoryData $data): NewsCategory
    {
        $order = NewsCategory::query()->max('order');

        return NewsCategory::query()->create([
            'slug' => $data->slug,
            'name' => $data->name,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
