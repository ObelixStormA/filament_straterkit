<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->helperText('Leave blank to auto-generate from the Uzbek title')
                    ->unique(ignoreRecord: true)
                    ->maxLength(150),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/pages'),

                Toggle::make('is_published')
                    ->default(true),

                DateTimePicker::make('published_at'),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_uz')->label('Title')->required()->maxLength(255),
                            RichEditor::make('content_html_uz')->label('Content'),
                            Section::make('SEO')->schema([
                                TextInput::make('meta_title_uz')->label('Meta title')->maxLength(255),
                                Textarea::make('meta_description_uz')->label('Meta description')->maxLength(500),
                            ])->collapsed(),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_ru')->label('Title')->maxLength(255),
                            RichEditor::make('content_html_ru')->label('Content'),
                            Section::make('SEO')->schema([
                                TextInput::make('meta_title_ru')->label('Meta title')->maxLength(255),
                                Textarea::make('meta_description_ru')->label('Meta description')->maxLength(500),
                            ])->collapsed(),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_en')->label('Title')->maxLength(255),
                            RichEditor::make('content_html_en')->label('Content'),
                            Section::make('SEO')->schema([
                                TextInput::make('meta_title_en')->label('Meta title')->maxLength(255),
                                Textarea::make('meta_description_en')->label('Meta description')->maxLength(500),
                            ])->collapsed(),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
