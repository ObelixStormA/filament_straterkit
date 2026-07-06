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
        ...self::CONTENT_PERMISSIONS,
    ];

    /**
     * @var array<int, string>
     */
    public const CONTENT_PERMISSIONS = [
        'about-section.update',
        'about-value.view', 'about-value.create', 'about-value.update', 'about-value.delete',
        'admission-application.view', 'admission-application.update', 'admission-application.delete',
        'admission-document.view', 'admission-document.create', 'admission-document.update', 'admission-document.delete',
        'admission-key-date.view', 'admission-key-date.create', 'admission-key-date.update', 'admission-key-date.delete',
        'admission-step.view', 'admission-step.create', 'admission-step.update', 'admission-step.delete',
        'contact-message.view', 'contact-message.update', 'contact-message.delete',
        'content-block.view', 'content-block.create', 'content-block.update', 'content-block.delete',
        'hero-slide.view', 'hero-slide.create', 'hero-slide.update', 'hero-slide.delete',
        'hero-stat.view', 'hero-stat.create', 'hero-stat.update', 'hero-stat.delete',
        'lab.view', 'lab.create', 'lab.update', 'lab.delete',
        'news.view', 'news.create', 'news.update', 'news.delete',
        'news-category.view', 'news-category.create', 'news-category.update', 'news-category.delete',
        'page.view', 'page.create', 'page.update', 'page.delete',
        'partner.view', 'partner.create', 'partner.update', 'partner.delete',
        'program.view', 'program.create', 'program.update', 'program.delete',
        'publication.view', 'publication.create', 'publication.update', 'publication.delete',
        'site-setting.update',
        'social-link.view', 'social-link.create', 'social-link.update', 'social-link.delete',
        'stat-number.view', 'stat-number.create', 'stat-number.update', 'stat-number.delete',
        'testimonial.view', 'testimonial.create', 'testimonial.update', 'testimonial.delete',
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
            ...self::CONTENT_PERMISSIONS,
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
