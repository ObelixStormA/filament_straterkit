<?php

declare(strict_types=1);

namespace App\Filament\Resources\News\Tables;

use App\Models\News;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->formatStateUsing(fn (News $record) => $record->getTranslation('title', 'uz'))
                    ->searchable(),

                TextColumn::make('category.name')
                    ->formatStateUsing(fn (News $record) => $record->category?->getTranslation('name', 'uz'))
                    ->placeholder('—'),

                IconColumn::make('is_published')->boolean(),
                IconColumn::make('is_featured')->boolean(),

                TextColumn::make('published_at')
                    ->dateTime()
                    ->placeholder('—'),
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
