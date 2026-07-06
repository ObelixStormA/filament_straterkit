<?php

declare(strict_types=1);

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('platform')
                    ->helperText('e.g. telegram, youtube, instagram, facebook')
                    ->required()
                    ->maxLength(50),

                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-telegram')
                    ->maxLength(60),

                TextInput::make('url')
                    ->url()
                    ->required()
                    ->maxLength(500),

                Select::make('display_location')
                    ->options([
                        'topbar' => 'Topbar',
                        'footer' => 'Footer',
                        'contact_page' => 'Contact page',
                    ])
                    ->required(),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
