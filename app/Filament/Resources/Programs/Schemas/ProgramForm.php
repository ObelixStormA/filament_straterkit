<?php

declare(strict_types=1);

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->helperText('Leave blank to auto-generate from the Uzbek name')
                    ->unique(ignoreRecord: true)
                    ->maxLength(150),

                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-lock')
                    ->maxLength(60),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/programs'),

                TextInput::make('duration_years')
                    ->numeric(),

                TextInput::make('degree_type')
                    ->maxLength(100),

                TextInput::make('quota')
                    ->numeric(),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('name_uz')->label('Name')->required()->maxLength(255),
                            TextInput::make('short_description_uz')->label('Short description')->maxLength(500),
                            RichEditor::make('full_description_uz')->label('Full description'),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('name_ru')->label('Name')->maxLength(255),
                            TextInput::make('short_description_ru')->label('Short description')->maxLength(500),
                            RichEditor::make('full_description_ru')->label('Full description'),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('name_en')->label('Name')->maxLength(255),
                            TextInput::make('short_description_en')->label('Short description')->maxLength(500),
                            RichEditor::make('full_description_en')->label('Full description'),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
