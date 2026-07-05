<?php

declare(strict_types=1);

use App\Filament\Resources\MediaAssets\Pages\CreateMediaAsset;
use App\Models\MediaAsset;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('uploads a media asset', function () {
    Storage::fake('public');

    $this->actingAs(adminUser());

    Livewire::test(CreateMediaAsset::class)
        ->fillForm([
            'name' => 'Company Logo',
            'file' => UploadedFile::fake()->image('logo.png'),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $asset = MediaAsset::query()->where('name', 'Company Logo')->firstOrFail();
    expect($asset->url)->not->toBeNull();
});
