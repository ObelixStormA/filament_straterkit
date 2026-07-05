<?php

declare(strict_types=1);

namespace App\Actions\Role;

use App\Actions\Permission\SyncPermissionsAction;
use App\Data\Role\RoleData;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateRoleAction
{
    public function __construct(
        private readonly SyncPermissionsAction $syncPermissions,
    ) {}

    public function handle(RoleData $data): Role
    {
        return DB::transaction(function () use ($data): Role {
            $role = Role::query()->create([
                'name' => $data->name,
                'guard_name' => 'web',
            ]);

            $this->syncPermissions->handle($role, $data->permissions);

            return $role;
        });
    }
}
