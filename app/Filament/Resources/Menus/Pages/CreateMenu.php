<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Pages;

use App\Actions\Menu\CreateMenuAction;
use App\Data\Menu\MenuData;
use App\Filament\Resources\Menus\MenuResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $menuData = MenuData::from([
            'parent_id' => $data['parent_id'] ?? null,
            'label' => array_filter([
                'en' => $data['label_en'] ?? null,
                'ru' => $data['label_ru'] ?? null,
                'uz' => $data['label_uz'] ?? null,
            ]),
            'url' => $data['url'] ?? null,
            'route_name' => $data['route_name'] ?? null,
            'icon' => $data['icon'] ?? null,
            'permission_name' => $data['permission_name'] ?? null,
            'is_active' => $data['is_active'] ?? true,
        ]);

        return app(CreateMenuAction::class)->handle($menuData);
    }
}
