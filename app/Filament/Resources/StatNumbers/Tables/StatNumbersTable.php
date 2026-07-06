<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatNumbers\Tables;

use App\Models\StatNumber;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StatNumbersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('number_value')
                    ->formatStateUsing(fn (StatNumber $record) => $record->number_value.$record->suffix),

                TextColumn::make('label')
                    ->formatStateUsing(fn (StatNumber $record) => $record->getTranslation('label', 'uz')),

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
