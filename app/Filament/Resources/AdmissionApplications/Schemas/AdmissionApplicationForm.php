<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionApplications\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdmissionApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')->disabled(),
                TextInput::make('last_name')->disabled(),
                TextInput::make('birth_year')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('email')->disabled(),
                Textarea::make('message')->disabled()->columnSpanFull(),

                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'in_review' => 'In review',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
            ]);
    }
}
