<?php

declare(strict_types=1);

namespace App\Actions\Menu;

use App\Data\Menu\MenuData;
use App\Models\Menu;

class CreateMenuAction
{
    public function handle(MenuData $data): Menu
    {
        $order = Menu::query()->where('parent_id', $data->parent_id)->max('order');

        return Menu::query()->create([
            'parent_id' => $data->parent_id,
            'label' => $data->label,
            'url' => $data->url,
            'route_name' => $data->route_name,
            'icon' => $data->icon,
            'permission_name' => $data->permission_name,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
            'link_type' => $data->link_type,
            'location' => $data->location,
            'page_id' => $data->page_id,
            'section_anchor' => $data->section_anchor,
            'open_in_new_tab' => $data->open_in_new_tab,
        ]);
    }
}
