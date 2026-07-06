<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionSteps\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AdmissionStepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('step_number')
                    ->numeric()
                    ->required(),

                TextInput::make('icon')
                    ->maxLength(60),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->required()->maxLength(200),
                            Textarea::make('description_uz')->label('Description')->maxLength(500),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(200),
                            Textarea::make('description_ru')->label('Description')->maxLength(500),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(200),
                            Textarea::make('description_en')->label('Description')->maxLength(500),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
