<?php

declare(strict_types=1);

namespace App\Filament\Resources\Labs\Tables;

use App\Models\Lab;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LabsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (Lab $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('box_size')
                    ->badge(),

                IconColumn::make('is_active')->boolean(),
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
