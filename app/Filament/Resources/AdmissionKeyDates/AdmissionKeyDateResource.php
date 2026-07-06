<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionKeyDates;

use App\Filament\Resources\AdmissionKeyDates\Pages\CreateAdmissionKeyDate;
use App\Filament\Resources\AdmissionKeyDates\Pages\EditAdmissionKeyDate;
use App\Filament\Resources\AdmissionKeyDates\Pages\ListAdmissionKeyDates;
use App\Filament\Resources\AdmissionKeyDates\Schemas\AdmissionKeyDateForm;
use App\Filament\Resources\AdmissionKeyDates\Tables\AdmissionKeyDatesTable;
use App\Models\AdmissionKeyDate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AdmissionKeyDateResource extends Resource
{
    protected static ?string $model = AdmissionKeyDate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static string|UnitEnum|null $navigationGroup = 'Admissions';

    public static function form(Schema $schema): Schema
    {
        return AdmissionKeyDateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionKeyDatesTable::configure($table);
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
            'index' => ListAdmissionKeyDates::route('/'),
            'create' => CreateAdmissionKeyDate::route('/create'),
            'edit' => EditAdmissionKeyDate::route('/{record}/edit'),
        ];
    }
}
