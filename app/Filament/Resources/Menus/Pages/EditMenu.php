<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Pages;

use App\Actions\Menu\DeleteMenuAction;
use App\Actions\Menu\UpdateMenuAction;
use App\Data\Menu\MenuData;
use App\Filament\Resources\Menus\MenuResource;
use App\Models\Menu;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMenu extends EditRecord
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteMenuAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var Menu $record */
        $record = $this->getRecord();
        $translations = $record->getTranslations('label');

        $data['label_en'] = $translations['en'] ?? null;
        $data['label_ru'] = $translations['ru'] ?? null;
        $data['label_uz'] = $translations['uz'] ?? null;

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
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
            'link_type' => $data['link_type'] ?? 'url',
            'location' => $data['location'] ?? 'header',
            'page_id' => $data['page_id'] ?? null,
            'section_anchor' => $data['section_anchor'] ?? null,
            'open_in_new_tab' => $data['open_in_new_tab'] ?? false,
        ]);

        /** @var Menu $record */
        return app(UpdateMenuAction::class)->handle($record, $menuData);
    }
}
