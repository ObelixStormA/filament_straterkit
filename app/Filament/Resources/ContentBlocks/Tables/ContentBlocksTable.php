<?php

declare(strict_types=1);

namespace App\Filament\Resources\ContentBlocks\Tables;

use App\Models\ContentBlock;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContentBlocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('block_key')
                    ->searchable(),

                TextColumn::make('title')
                    ->formatStateUsing(fn (ContentBlock $record) => $record->getTranslation('title', 'uz'))
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
