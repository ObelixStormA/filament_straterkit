<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * @var array<int, string>
     */
    public const PERMISSIONS = [
        'user.view', 'user.create', 'user.update', 'user.delete',
        'role.view', 'role.create', 'role.update', 'role.delete',
        'permission.view',
        'settings.manage',
        'menu.view', 'menu.create', 'menu.update', 'menu.delete',
        'media.view', 'media.create', 'media.delete',
        'notification.view',
        'activity.view',
    ];

    /**
     * @var array<string, array<int, string>>
     */
    public const ROLES = [
        'super-admin' => self::PERMISSIONS,
        'admin' => [
            'user.view', 'user.create', 'user.update', 'user.delete',
            'permission.view',
            'settings.manage',
            'menu.view', 'menu.create', 'menu.update', 'menu.delete',
            'media.view', 'media.create', 'media.delete',
            'notification.view',
            'activity.view',
        ],
        'user' => [],
    ];

    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (self::PERMISSIONS as $permission) {
            Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        foreach (self::ROLES as $roleName => $permissions) {
            $role = Role::query()->firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);

            $role->syncPermissions($permissions);
        }

        Cache::forget('spatie.permission.cache');
    }
}
