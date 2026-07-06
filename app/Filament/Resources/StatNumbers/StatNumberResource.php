<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatNumbers;

use App\Filament\Resources\StatNumbers\Pages\CreateStatNumber;
use App\Filament\Resources\StatNumbers\Pages\EditStatNumber;
use App\Filament\Resources\StatNumbers\Pages\ListStatNumbers;
use App\Filament\Resources\StatNumbers\Schemas\StatNumberForm;
use App\Filament\Resources\StatNumbers\Tables\StatNumbersTable;
use App\Models\StatNumber;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StatNumberResource extends Resource
{
    protected static ?string $model = StatNumber::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Homepage';

    public static function form(Schema $schema): Schema
    {
        return StatNumberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatNumbersTable::configure($table);
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
            'index' => ListStatNumbers::route('/'),
            'create' => CreateStatNumber::route('/create'),
            'edit' => EditStatNumber::route('/{record}/edit'),
        ];
    }
}
