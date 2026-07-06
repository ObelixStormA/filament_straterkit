<?php

declare(strict_types=1);

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/testimonials'),

                Select::make('person_type')
                    ->options(['graduate' => 'Graduate', 'teacher' => 'Teacher'])
                    ->required()
                    ->default('graduate'),

                Select::make('rating')
                    ->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])
                    ->required()
                    ->default(5),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('display_name_uz')->label('Display name')->required()->maxLength(200),
                            Textarea::make('quote_text_uz')->label('Quote'),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('display_name_ru')->label('Display name')->maxLength(200),
                            Textarea::make('quote_text_ru')->label('Quote'),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('display_name_en')->label('Display name')->maxLength(200),
                            Textarea::make('quote_text_en')->label('Quote'),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
