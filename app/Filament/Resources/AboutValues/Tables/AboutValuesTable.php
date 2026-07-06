<?php

declare(strict_types=1);

namespace App\Filament\Resources\AboutValues\Tables;

use App\Models\AboutValue;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AboutValuesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (AboutValue $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('icon'),

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
