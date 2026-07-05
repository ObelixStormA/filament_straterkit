<?php

declare(strict_types=1);

use App\Actions\User\CreateUserAction;
use App\Data\User\UserData;
use App\Filament\Resources\Activities\ActivityResource;
use App\Filament\Resources\Activities\Pages\ListActivities;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Activitylog\Models\Activity;

it('records an activity log entry when a user is created', function () {
    app(CreateUserAction::class)->handle(new UserData(
        name: 'Logged User',
        email: 'logged@example.com',
        password: 'password',
        roles: [],
    ));

    expect(Activity::query()->where('log_name', 'user')->exists())->toBeTrue();
});

it('lists the audit log for a super-admin', function () {
    $this->actingAs(superAdmin());

    Livewire::test(ListActivities::class)->assertSuccessful();
});

it('allows an admin with the activity.view permission to see the audit log', function () {
    $this->actingAs(adminUser())
        ->get(ActivityResource::getUrl('index'))
        ->assertSuccessful();
});

it('denies audit log access to a user without the permission', function () {
    $user = User::factory()->withRole('user')->create();

    $this->actingAs($user)
        ->get(ActivityResource::getUrl('index'))
        ->assertForbidden();
});
