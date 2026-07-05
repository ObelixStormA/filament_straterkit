<?php

declare(strict_types=1);

use App\Actions\Role\DeleteRoleAction;
use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\RoleResource;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

it('lists roles for a super-admin', function () {
    $this->actingAs(superAdmin());

    Livewire::test(ListRoles::class)->assertSuccessful();
});

it('denies role management to an admin without role permissions', function () {
    $this->actingAs(adminUser())
        ->get(RoleResource::getUrl('index'))
        ->assertForbidden();
});

it('creates a role with permissions', function () {
    $this->actingAs(superAdmin());

    Livewire::test(CreateRole::class)
        ->fillForm([
            'name' => 'editor',
            'permissions' => ['menu.view', 'menu.update'],
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $role = Role::query()->where('name', 'editor')->firstOrFail();
    expect($role->hasPermissionTo('menu.view'))->toBeTrue();
});

it('prevents deleting the super-admin role', function () {
    $role = Role::query()->where('name', 'super-admin')->firstOrFail();

    expect(fn () => app(DeleteRoleAction::class)->handle($role))
        ->toThrow(ValidationException::class);
});
