<?php

declare(strict_types=1);

use App\Filament\Clusters\Settings\Pages\ManageGeneralSettings;
use App\Models\User;
use App\Settings\GeneralSettings;
use Livewire\Livewire;

it('lets an admin update the general settings', function () {
    $this->actingAs(adminUser());

    Livewire::test(ManageGeneralSettings::class)
        ->fillForm([
            'site_name' => 'My Custom App',
            'timezone' => 'UTC',
            'locale' => 'en',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect(app(GeneralSettings::class)->site_name)->toBe('My Custom App');
});

it('denies settings access to a user without the settings.manage permission', function () {
    $user = User::factory()->withRole('user')->create();

    $this->actingAs($user)
        ->get(ManageGeneralSettings::getUrl())
        ->assertForbidden();
});
