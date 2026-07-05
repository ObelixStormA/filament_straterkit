<?php

declare(strict_types=1);

namespace App\Actions\Menu;

use App\Data\Menu\MenuData;
use App\Models\Menu;

class UpdateMenuAction
{
    public function handle(Menu $menu, MenuData $data): Menu
    {
        $menu->update([
            'parent_id' => $data->parent_id,
            'label' => $data->label,
            'url' => $data->url,
            'route_name' => $data->route_name,
            'icon' => $data->icon,
            'permission_name' => $data->permission_name,
            'is_active' => $data->is_active,
        ]);

        return $menu;
    }
}
