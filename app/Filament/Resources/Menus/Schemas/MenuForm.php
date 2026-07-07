<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
use App\Models\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Permission;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parent_id')
                    ->label('Parent menu')
                    ->options(fn (?Menu $record): array => Menu::query()
                        ->when($record, fn ($query) => $query->whereKeyNot($record->id))
                        ->get()
                        ->pluck('label', 'id')
                        ->all())
                    ->searchable(),

                Select::make('location')
                    ->label('Location')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                    ])
                    ->default('header')
                    ->required(),

                TextInput::make('label_en')
                    ->label('Label (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('label_ru')
                    ->label('Label (Russian)')
                    ->maxLength(255),

                TextInput::make('label_uz')
                    ->label('Label (Uzbek)')
                    ->maxLength(255),

                Select::make('link_type')
                    ->label('Link type')
                    ->options([
                        'route' => 'Named route',
                        'page' => 'CMS page',
                        'url' => 'URL / no link',
                    ])
                    ->default('url')
                    ->live()
                    ->required(),

                TextInput::make('route_name')
                    ->label('Route name')
                    ->helperText('e.g. home, news.index')
                    ->maxLength(255)
                    ->visible(fn ($get): bool => $get('link_type') === 'route'),

                Select::make('page_id')
                    ->label('Page')
                    ->options(fn (): array => Page::query()->get()->pluck('title', 'id')->all())
                    ->searchable()
                    ->visible(fn ($get): bool => $get('link_type') === 'page'),

                TextInput::make('url')
                    ->label('URL')
                    ->helperText('Absolute (https://...) or relative (/dashboard) path')
                    ->maxLength(255)
                    ->visible(fn ($get): bool => $get('link_type') === 'url'),

                TextInput::make('section_anchor')
                    ->label('Section anchor')
                    ->helperText("Optional in-page anchor, e.g. 'about' for #about")
                    ->maxLength(255)
                    ->visible(fn ($get): bool => in_array($get('link_type'), ['route', 'page'], true)),

                TextInput::make('icon')
                    ->helperText('Heroicon name, e.g. heroicon-o-home')
                    ->maxLength(255),

                Select::make('permission_name')
                    ->label('Required permission')
                    ->options(fn (): array => Permission::query()->pluck('name', 'name')->all())
                    ->searchable()
                    ->helperText('Leave empty to make visible to everyone'),

                Toggle::make('open_in_new_tab')
                    ->label('Open in new tab')
                    ->default(false),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
