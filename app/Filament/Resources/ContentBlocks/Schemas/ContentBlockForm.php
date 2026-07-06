<?php

declare(strict_types=1);

namespace App\Filament\Resources\ContentBlocks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ContentBlockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('block_key')
                    ->label('Block key')
                    ->helperText('Unique key, e.g. section_yonalishlar_intro')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100),

                TextInput::make('icon')
                    ->helperText('Font Awesome class, e.g. fa-shield')
                    ->maxLength(60),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/content-blocks'),

                TextInput::make('button_url')
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->maxLength(500),
                            TextInput::make('subtitle_uz')->label('Subtitle'),
                            TextInput::make('button_text_uz')->label('Button text')->maxLength(100),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(500),
                            TextInput::make('subtitle_ru')->label('Subtitle'),
                            TextInput::make('button_text_ru')->label('Button text')->maxLength(100),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(500),
                            TextInput::make('subtitle_en')->label('Subtitle'),
                            TextInput::make('button_text_en')->label('Button text')->maxLength(100),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
