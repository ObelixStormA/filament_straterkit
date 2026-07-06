<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionApplications\Tables;

use App\Models\AdmissionApplication;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdmissionApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('first_name')
                    ->formatStateUsing(fn (AdmissionApplication $record) => "{$record->first_name} {$record->last_name}")
                    ->label('Applicant')
                    ->searchable(['first_name', 'last_name']),

                TextColumn::make('phone'),

                TextColumn::make('program.name')
                    ->formatStateUsing(fn (AdmissionApplication $record) => $record->program?->getTranslation('name', 'uz'))
                    ->placeholder('—'),

                TextColumn::make('status')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime(),
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
