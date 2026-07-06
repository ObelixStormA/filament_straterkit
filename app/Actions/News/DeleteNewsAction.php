<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Models\News;

class DeleteNewsAction
{
    public function handle(News $news): void
    {
        $news->delete();
    }
}
