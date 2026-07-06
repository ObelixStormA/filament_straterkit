<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionSteps\Tables;

use App\Models\AdmissionStep;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdmissionStepsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->columns([
                TextColumn::make('step_number')
                    ->label('#'),

                TextColumn::make('title')
                    ->formatStateUsing(fn (AdmissionStep $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

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
