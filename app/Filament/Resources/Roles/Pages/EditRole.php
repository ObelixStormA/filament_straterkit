<?php

declare(strict_types=1);

namespace App\Filament\Resources\Roles\Pages;

use App\Actions\Role\DeleteRoleAction;
use App\Actions\Role\UpdateRoleAction;
use App\Data\Role\RoleData;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteRoleAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var Role $record */
        $record = $this->getRecord();

        $data['permissions'] = $record->permissions->pluck('name')->all();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $roleData = RoleData::from([
            'name' => $data['name'],
            'permissions' => $data['permissions'] ?? [],
        ]);

        /** @var Role $record */
        return app(UpdateRoleAction::class)->handle($record, $roleData);
    }
}
