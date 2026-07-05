<?php

declare(strict_types=1);

namespace App\Actions\Menu;

use App\Models\Menu;

class DeleteMenuAction
{
    public function handle(Menu $menu): void
    {
        $menu->delete();
    }
}
