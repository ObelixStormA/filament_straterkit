<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options(['journal' => 'Journal', 'collection' => 'Collection'])
                    ->required()
                    ->live()
                    ->default('journal'),

                FileUpload::make('cover_image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/publications'),

                TextInput::make('year')
                    ->numeric()
                    ->required(),

                TextInput::make('issue_number')
                    ->visible(fn ($get) => $get('type') === 'journal')
                    ->maxLength(20),

                TextInput::make('event_type')
                    ->visible(fn ($get) => $get('type') === 'collection')
                    ->maxLength(150),

                Select::make('code_type')
                    ->options(['ISSN' => 'ISSN', 'ISBN' => 'ISBN']),

                TextInput::make('code_value')
                    ->maxLength(50),

                FileUpload::make('file_url')
                    ->disk('public')
                    ->directory('uploads/publications')
                    ->acceptedFileTypes(['application/pdf']),

                Toggle::make('is_published')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->required()->maxLength(300),
                            Textarea::make('description_uz')->label('Description'),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(300),
                            Textarea::make('description_ru')->label('Description'),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(300),
                            Textarea::make('description_en')->label('Description'),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
