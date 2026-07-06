<?php

declare(strict_types=1);

namespace App\Filament\Resources\AboutValues\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AboutValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-shield')
                    ->maxLength(60),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->required()->maxLength(150),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(150),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(150),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
