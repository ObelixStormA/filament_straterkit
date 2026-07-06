<?php

declare(strict_types=1);

namespace App\Actions\NewsCategory;

use App\Models\NewsCategory;

class DeleteNewsCategoryAction
{
    public function handle(NewsCategory $newsCategory): void
    {
        $newsCategory->delete();
    }
}
