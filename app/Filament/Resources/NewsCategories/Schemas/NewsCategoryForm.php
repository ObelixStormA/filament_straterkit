<?php

declare(strict_types=1);

namespace App\Filament\Resources\NewsCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->helperText('Leave blank to auto-generate from the Uzbek name')
                    ->unique(ignoreRecord: true)
                    ->maxLength(150),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('name_uz')->label('Name')->required()->maxLength(150),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('name_ru')->label('Name')->maxLength(150),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('name_en')->label('Name')->maxLength(150),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
