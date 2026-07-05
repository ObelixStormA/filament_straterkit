<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
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

                TextInput::make('url')
                    ->label('URL')
                    ->helperText('Absolute (https://...) or relative (/dashboard) path')
                    ->maxLength(255),

                TextInput::make('route_name')
                    ->label('Route name')
                    ->maxLength(255),

                TextInput::make('icon')
                    ->helperText('Heroicon name, e.g. heroicon-o-home')
                    ->maxLength(255),

                Select::make('permission_name')
                    ->label('Required permission')
                    ->options(fn (): array => Permission::query()->pluck('name', 'name')->all())
                    ->searchable()
                    ->helperText('Leave empty to make visible to everyone'),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
