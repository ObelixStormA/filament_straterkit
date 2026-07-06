<?php

declare(strict_types=1);

namespace App\Filament\Resources\Programs\Tables;

use App\Models\Program;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('name')
                    ->formatStateUsing(fn (Program $record) => $record->getTranslation('name', 'uz'))
                    ->searchable(),

                TextColumn::make('degree_type')
                    ->placeholder('—'),

                TextColumn::make('duration_years')
                    ->placeholder('—'),

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
