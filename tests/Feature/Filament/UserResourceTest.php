<?php

declare(strict_types=1);

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Livewire\Livewire;

it('lists users for an authorized admin', function () {
    $admin = adminUser();
    User::factory()->count(3)->create();

    $this->actingAs($admin);

    Livewire::test(ListUsers::class)->assertSuccessful();
});

it('denies panel access entirely to a non-admin user', function () {
    $user = User::factory()->withRole('user')->create();

    $this->actingAs($user)
        ->get(UserResource::getUrl('index'))
        ->assertForbidden();
});

it('creates a user with a role through the resource form', function () {
    $admin = adminUser();
    $this->actingAs($admin);

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
            'roles' => ['user'],
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $user = User::query()->where('email', 'jane@example.com')->firstOrFail();
    expect($user->hasRole('user'))->toBeTrue();
});

it('updates a user through the resource form', function () {
    $admin = adminUser();
    $target = User::factory()->withRole('user')->create();

    $this->actingAs($admin);

    Livewire::test(EditUser::class, ['record' => $target->getRouteKey()])
        ->fillForm([
            'name' => 'Updated Name',
            'email' => $target->email,
            'roles' => ['admin'],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($target->refresh()->name)->toBe('Updated Name')
        ->and($target->hasRole('admin'))->toBeTrue();
});
