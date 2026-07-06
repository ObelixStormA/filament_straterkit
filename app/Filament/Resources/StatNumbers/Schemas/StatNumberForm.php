<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatNumbers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class StatNumberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-university')
                    ->maxLength(60),

                TextInput::make('number_value')
                    ->numeric()
                    ->required(),

                TextInput::make('suffix')
                    ->helperText('e.g. + or %')
                    ->maxLength(10),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('label_uz')->label('Label')->required()->maxLength(150),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('label_ru')->label('Label')->maxLength(150),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('label_en')->label('Label')->maxLength(150),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
