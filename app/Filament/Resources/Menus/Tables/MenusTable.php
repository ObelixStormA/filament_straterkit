<?php

declare(strict_types=1);

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('label')
                    ->label('Label')
                    ->formatStateUsing(fn ($record) => str_repeat('— ', $record->parent_id ? 1 : 0).$record->label)
                    ->searchable(),

                TextColumn::make('parent.label')
                    ->label('Parent')
                    ->placeholder('—'),

                TextColumn::make('url')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('permission_name')
                    ->label('Permission')
                    ->badge()
                    ->placeholder('Public'),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
