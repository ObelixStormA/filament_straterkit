<?php

declare(strict_types=1);

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('background_type')
                    ->options(['image' => 'Image', 'video' => 'Video'])
                    ->required()
                    ->live()
                    ->default('image'),

                FileUpload::make('background_image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/hero-slides')
                    ->visible(fn ($get) => $get('background_type') === 'image'),

                FileUpload::make('background_video')
                    ->disk('public')
                    ->directory('uploads/hero-slides')
                    ->acceptedFileTypes(['video/mp4'])
                    ->visible(fn ($get) => $get('background_type') === 'video'),

                TextInput::make('primary_button_url')
                    ->label('Primary button URL')
                    ->maxLength(255),

                TextInput::make('secondary_button_url')
                    ->label('Secondary button URL')
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")
                            ->schema([
                                TextInput::make('title_uz')->label('Title')->required()->maxLength(255),
                                TextInput::make('subtitle_uz')->label('Subtitle')->maxLength(500),
                                TextInput::make('primary_button_text_uz')->label('Primary button text')->maxLength(100),
                                TextInput::make('secondary_button_text_uz')->label('Secondary button text')->maxLength(100),
                            ]),
                        Tab::make('Русский')
                            ->schema([
                                TextInput::make('title_ru')->label('Title')->maxLength(255),
                                TextInput::make('subtitle_ru')->label('Subtitle')->maxLength(500),
                                TextInput::make('primary_button_text_ru')->label('Primary button text')->maxLength(100),
                                TextInput::make('secondary_button_text_ru')->label('Secondary button text')->maxLength(100),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('title_en')->label('Title')->maxLength(255),
                                TextInput::make('subtitle_en')->label('Subtitle')->maxLength(500),
                                TextInput::make('primary_button_text_en')->label('Primary button text')->maxLength(100),
                                TextInput::make('secondary_button_text_en')->label('Secondary button text')->maxLength(100),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
