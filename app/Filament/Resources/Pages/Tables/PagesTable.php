<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Tables;

use App\Models\Page;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (Page $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('slug'),

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
