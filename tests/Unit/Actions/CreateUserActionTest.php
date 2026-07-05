<?php

declare(strict_types=1);

use App\Actions\User\CreateUserAction;
use App\Data\User\UserData;
use App\Events\User\UserCreated;
use Illuminate\Support\Facades\Event;

it('creates a user, hashes the password, and syncs roles', function () {
    $user = app(CreateUserAction::class)->handle(new UserData(
        name: 'Alice',
        email: 'alice@example.com',
        password: 'plain-text-password',
        roles: ['user'],
    ));

    expect($user->exists)->toBeTrue()
        ->and($user->password)->not->toBe('plain-text-password')
        ->and($user->hasRole('user'))->toBeTrue();
});

it('dispatches the UserCreated event', function () {
    Event::fake([UserCreated::class]);

    app(CreateUserAction::class)->handle(new UserData(
        name: 'Bob',
        email: 'bob@example.com',
        password: 'password',
        roles: [],
    ));

    Event::assertDispatched(UserCreated::class, fn ($event) => $event->user->email === 'bob@example.com');
});
