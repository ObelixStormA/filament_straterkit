<?php

declare(strict_types=1);

namespace App\Filament\Resources\AboutValues;

use App\Filament\Resources\AboutValues\Pages\CreateAboutValue;
use App\Filament\Resources\AboutValues\Pages\EditAboutValue;
use App\Filament\Resources\AboutValues\Pages\ListAboutValues;
use App\Filament\Resources\AboutValues\Schemas\AboutValueForm;
use App\Filament\Resources\AboutValues\Tables\AboutValuesTable;
use App\Models\AboutValue;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AboutValueResource extends Resource
{
    protected static ?string $model = AboutValue::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static string|UnitEnum|null $navigationGroup = 'Homepage';

    public static function form(Schema $schema): Schema
    {
        return AboutValueForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutValuesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAboutValues::route('/'),
            'create' => CreateAboutValue::route('/create'),
            'edit' => EditAboutValue::route('/{record}/edit'),
        ];
    }
}
