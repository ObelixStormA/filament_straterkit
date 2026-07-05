<?php

declare(strict_types=1);

namespace App\Filament\Resources\MediaAssets\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MediaAssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('file')
                    ->required()
                    ->disk('public')
                    ->directory('media-assets')
                    ->openable()
                    ->downloadable(),
            ]);
    }
}
