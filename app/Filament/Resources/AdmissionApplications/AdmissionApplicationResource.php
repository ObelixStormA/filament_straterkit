<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionApplications;

use App\Filament\Resources\AdmissionApplications\Pages\EditAdmissionApplication;
use App\Filament\Resources\AdmissionApplications\Pages\ListAdmissionApplications;
use App\Filament\Resources\AdmissionApplications\Schemas\AdmissionApplicationForm;
use App\Filament\Resources\AdmissionApplications\Tables\AdmissionApplicationsTable;
use App\Models\AdmissionApplication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AdmissionApplicationResource extends Resource
{
    protected static ?string $model = AdmissionApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static string|UnitEnum|null $navigationGroup = 'Admissions';

    public static function form(Schema $schema): Schema
    {
        return AdmissionApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionApplicationsTable::configure($table);
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
            'index' => ListAdmissionApplications::route('/'),
            'edit' => EditAdmissionApplication::route('/{record}/edit'),
        ];
    }
}
