<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionKeyDates\Tables;

use App\Models\AdmissionKeyDate;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdmissionKeyDatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (AdmissionKeyDate $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('date_start')->date()->placeholder('—'),
                TextColumn::make('date_end')->date()->placeholder('—'),

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
