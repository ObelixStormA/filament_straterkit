<?php

declare(strict_types=1);

use App\Filament\Resources\Menus\Pages\CreateMenu;
use App\Models\Menu;
use App\Models\User;
use Livewire\Livewire;

it('creates a nested, translatable menu item', function () {
    $this->actingAs(superAdmin());

    $parent = Menu::factory()->create(['label' => ['en' => 'Parent']]);

    Livewire::test(CreateMenu::class)
        ->fillForm([
            'parent_id' => $parent->id,
            'label_en' => 'Dashboard',
            'label_ru' => 'Панель',
            'url' => '/dashboard',
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $menu = Menu::query()->where('parent_id', $parent->id)->firstOrFail();
    expect($menu->getTranslation('label', 'en'))->toBe('Dashboard')
        ->and($menu->getTranslation('label', 'ru'))->toBe('Панель');
});

it('hides a permission-gated menu item from users without that permission', function () {
    $menu = Menu::factory()->create([
        'permission_name' => 'settings.manage',
    ]);

    $user = User::factory()->withRole('user')->create();
    $this->actingAs($user);

    expect($menu->is_visible_to_user)->toBeFalse();
});
