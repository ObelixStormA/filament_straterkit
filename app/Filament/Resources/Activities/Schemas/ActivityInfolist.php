<?php

declare(strict_types=1);

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Models\Activity;

class ActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Summary')
                    ->columns(2)
                    ->components([
                        TextEntry::make('log_name')->label('Log'),
                        TextEntry::make('event')->placeholder('—'),
                        TextEntry::make('description'),
                        TextEntry::make('causer.name')->label('Caused by')->placeholder('System'),
                        TextEntry::make('subject_type')->label('Subject type')
                            ->formatStateUsing(fn (?string $state): string => $state ? class_basename($state) : '—'),
                        TextEntry::make('subject_id')->label('Subject ID')->placeholder('—'),
                        TextEntry::make('created_at')->dateTime(),
                    ]),

                Section::make('Changes')
                    ->components([
                        TextEntry::make('changes_before')
                            ->label('Before')
                            ->state(fn (Activity $record): string => self::formatProperties($record->properties['old'] ?? []))
                            ->columnSpanFull(),

                        TextEntry::make('changes_after')
                            ->label('After')
                            ->state(fn (Activity $record): string => self::formatProperties($record->properties['attributes'] ?? []))
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    private static function formatProperties(mixed $properties): string
    {
        $array = $properties instanceof Collection ? $properties->toArray() : $properties;

        if (empty($array)) {
            return '—';
        }

        return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?: '—';
    }
}
