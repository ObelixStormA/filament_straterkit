<?php

declare(strict_types=1);

use App\Models\User;
use App\Policies\UserPolicy;

it('allows a user with the user.view permission to view any users', function () {
    $user = adminUser();

    expect((new UserPolicy)->viewAny($user))->toBeTrue();
});

it('denies viewing users without the permission', function () {
    $user = User::factory()->withRole('user')->create();

    expect((new UserPolicy)->viewAny($user))->toBeFalse();
});

it('prevents a user from deleting themselves', function () {
    $admin = adminUser();

    expect((new UserPolicy)->delete($admin, $admin))->toBeFalse();
});

it('allows an admin to delete other users', function () {
    $admin = adminUser();
    $other = User::factory()->create();

    expect((new UserPolicy)->delete($admin, $other))->toBeTrue();
});

it('grants super-admin every ability via the Gate::before bypass', function () {
    $superAdmin = superAdmin();
    $other = User::factory()->create();

    expect($superAdmin->can('delete', $other))->toBeTrue()
        ->and($superAdmin->can('anything.made.up'))->toBeTrue();
});
