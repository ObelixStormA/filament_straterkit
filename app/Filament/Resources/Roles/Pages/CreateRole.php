<?php

declare(strict_types=1);

namespace App\Filament\Resources\Roles\Pages;

use App\Actions\Role\CreateRoleAction;
use App\Data\Role\RoleData;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $roleData = RoleData::from([
            'name' => $data['name'],
            'permissions' => $data['permissions'] ?? [],
        ]);

        return app(CreateRoleAction::class)->handle($roleData);
    }
}
