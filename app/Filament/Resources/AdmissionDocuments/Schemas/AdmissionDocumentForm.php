<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionDocuments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AdmissionDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('file_template_url')
                    ->label('Template file')
                    ->disk('public')
                    ->directory('uploads/admission-documents'),

                Toggle::make('is_active')
                    ->default(true),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('name_uz')->label('Name')->required()->maxLength(255),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('name_ru')->label('Name')->maxLength(255),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('name_en')->label('Name')->maxLength(255),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
