<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publications\Tables;

use App\Models\Publication;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PublicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (Publication $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('type')
                    ->badge(),

                TextColumn::make('year'),

                IconColumn::make('is_published')->boolean(),
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
