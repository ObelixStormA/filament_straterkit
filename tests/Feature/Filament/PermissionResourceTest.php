<?php

declare(strict_types=1);

use App\Filament\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Resources\Permissions\PermissionResource;
use Livewire\Livewire;

it('lists permissions for a super-admin', function () {
    $this->actingAs(superAdmin());

    Livewire::test(ListPermissions::class)->assertSuccessful();
});

it('never exposes a create action for permissions', function () {
    expect(PermissionResource::canCreate())->toBeFalse();
});
