<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Actions\Permission\SyncPermissionsAction;
use App\Data\Role\RoleData;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UpdateRoleAction
{
    public function __construct(
        private readonly SyncPermissionsAction $syncPermissions,
    ) {}

    public function handle(Role $role, RoleData $data): Role
    {
        return DB::transaction(function () use ($role, $data): Role {
            $role->update(['name' => $data->name]);

            $this->syncPermissions->handle($role, $data->permissions);

            return $role;
        });
    }
}
