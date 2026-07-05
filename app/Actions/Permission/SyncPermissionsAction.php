<?php

declare(strict_types=1);

namespace App\Actions\Permission;

use Spatie\Permission\Models\Role;

class SyncPermissionsAction
{
    /**
     * @param  array<int, string>  $permissions
     */
    public function handle(Role $role, array $permissions): Role
    {
        $role->syncPermissions($permissions);

        return $role;
    }
}
