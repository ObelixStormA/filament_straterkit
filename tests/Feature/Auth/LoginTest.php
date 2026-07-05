<?php

declare(strict_types=1);

use App\Models\User;
use Filament\Auth\Pages\Login;
use Livewire\Livewire;

it('allows an admin to log in and access the panel', function () {
    $user = superAdmin();

    Livewire::test(Login::class)
        ->set('data.email', $user->email)
        ->set('data.password', 'password')
        ->call('authenticate')
        ->assertRedirect('/admin');

    $this->assertAuthenticatedAs($user);
});

it('rejects invalid credentials', function () {
    superAdmin();

    Livewire::test(Login::class)
        ->set('data.email', 'wrong@example.com')
        ->set('data.password', 'wrong-password')
        ->call('authenticate')
        ->assertHasFormErrors();

    $this->assertGuest();
});

it('denies panel access to a user without an admin role', function () {
    $user = User::factory()->withRole('user')->create();

    expect($user->canAccessPanel(filament()->getPanel('admin')))->toBeFalse();
});
