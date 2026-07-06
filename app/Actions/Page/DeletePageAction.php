<?php

declare(strict_types=1);

namespace App\Actions\Page;

use App\Models\Page;

class DeletePageAction
{
    public function handle(Page $page): void
    {
        $page->delete();
    }
}
