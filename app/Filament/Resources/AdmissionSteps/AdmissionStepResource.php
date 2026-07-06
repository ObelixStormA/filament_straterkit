<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionSteps;

use App\Filament\Resources\AdmissionSteps\Pages\CreateAdmissionStep;
use App\Filament\Resources\AdmissionSteps\Pages\EditAdmissionStep;
use App\Filament\Resources\AdmissionSteps\Pages\ListAdmissionSteps;
use App\Filament\Resources\AdmissionSteps\Schemas\AdmissionStepForm;
use App\Filament\Resources\AdmissionSteps\Tables\AdmissionStepsTable;
use App\Models\AdmissionStep;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AdmissionStepResource extends Resource
{
    protected static ?string $model = AdmissionStep::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'Admissions';

    public static function form(Schema $schema): Schema
    {
        return AdmissionStepForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdmissionStepsTable::configure($table);
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
            'index' => ListAdmissionSteps::route('/'),
            'create' => CreateAdmissionStep::route('/create'),
            'edit' => EditAdmissionStep::route('/{record}/edit'),
        ];
    }
}
