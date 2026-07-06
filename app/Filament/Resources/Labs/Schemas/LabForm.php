<?php

declare(strict_types=1);

namespace App\Filament\Resources\Labs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class LabForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-shield')
                    ->maxLength(60),

                Select::make('box_size')
                    ->options(['normal' => 'Normal', 'wide' => 'Wide'])
                    ->required()
                    ->default('normal'),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->required()->maxLength(255),
                            Textarea::make('description_uz')->label('Description'),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(255),
                            Textarea::make('description_ru')->label('Description'),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(255),
                            Textarea::make('description_en')->label('Description'),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
